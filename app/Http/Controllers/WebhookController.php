<?php

namespace App\Http\Controllers;

use Laravel\Paddle\Http\Controllers\WebhookController as CashierController;
use App\Models\Plan;
use App\Models\User;
use Laravel\Paddle\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends CashierController
{

    /**
     * Handle a Paddle webhook call.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function webhook(Request $request)
    {
        info($request->getContent());
        $payload = json_decode($request->getContent(), true);

        if (! isset($payload['event_type'])) {
            return new Response();
        }

        $method = 'handle'.Str::studly(Str::replace('.', '_', $payload['event_type']));
        if (method_exists($this, $method)) {
            $this->{$method}($payload);
            return new Response('Webhook Handled');
        }

        return new Response();
    }

    protected function handleSubscriptionCreated(array $payload): void
    {
        $user = User::find($payload['data']['custom_data']['user_id']);
        $subscription = $user->subscriptions()->create([
            'name'          => $payload['data']['custom_data']['plan_name'],
            'paddle_id'     => $payload['data']['id'],
            'paddle_plan'   => $payload['data']['items'][0]['price']['id'],
            'paddle_status' => $payload['data']['status'],
            'quantity'      => $payload['data']['items'][0]['quantity'],
        ]);
        Customer::where('billable_id', $subscription->billable_id)->update(['trial_ends_at' => null]);
    }

    protected function handleSubscriptionUpdated(array $payload): void
    {
        $subscriptionId = Arr::get($payload, 'data.id');
        if (! $subscription = $this->findSubscription($subscriptionId)) {
            return;
        }

        // Plan...
        if (isset($payload['data']['items'][0]['price']['id'])) {
            $subscription->paddle_plan = $payload['data']['items'][0]['price']['id'];
            /** @var Plan $plan */
            $plan = Plan::where('paddle_id', $subscription->paddle_plan)->first();
            $subscription->name = $plan->internal_name;
        }

        // Status...
        if (isset($payload['data']['status'])) {
            $subscription->paddle_status = $payload['data']['status'];
        }

        // Paused...
        if (isset($payload['data']['scheduled_change']['action']) && $payload['data']['scheduled_change']['action'] == 'pause') {
            $subscription->paused_from = Carbon::parse($payload['data']['scheduled_change']['effective_at'])->setTimezone('UTC');
        } else {
            $subscription->paused_from = null;
        }

        $subscription->save();
    }

}
