<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Laravel\Paddle\Cashier;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function billing()
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $subscription = null;

        if ($user->subscriptions()->exists()) {
            $subscription = $user->subscriptions()->first();
        }

        $plans = Plan::all();

        $plan = $user->plan();

        return view('account.billing', [
            'subscription' => $subscription,
            'plans' => $plans,
            'plan' => $plan,
            'user' => $user
        ]);
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'paddle_id' => ['required', 'exists:plans,paddle_id'],
        ]);


        $plan = Plan::where('paddle_id', $validated['paddle_id'])->first();
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        return view('account.checkout', compact( 'plan'));
    }

    public function swapSubscription(Request $request)
    {
        $validated = $request->validate(
            [
            'paddle_id' => ['required', 'exists:plans,paddle_id'],
            ],
            [
                'paddle_id.required' => 'You have to choose the plan!',
            ]
        );

        $plan = Plan::where('paddle_id', $validated['paddle_id'])->first();

        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        /** @var Subscription $subscription */
        $subscription = $user->subscriptions()->active()->first();

        // No active subscription, should go to checkout instead
        if (!$subscription) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'You do not have an active subscription.']);
        }

        // Already subscribed
        if ($subscription->paddle_plan === $plan->paddle_id) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'You are already subscribed to this plan.']);
        }

        // Unpause if paused
        if ($subscription->paused()) {
            $subscription->unpause();
        }

        // Delete if cancelled & checkout
        if ($subscription->cancelled()) {
            $subscription->delete();
            return $this->checkout($request);
        }

        // Swap
        $subscription->swapAndInvoice($plan->paddle_id);

        return redirect()->route('account.billing');
    }

    public function cancelSubscription(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        /** @var Subscription $subscription */
        $subscription = $user->subscriptions()->active()->first();

        if (!$subscription) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'You do not have an active subscription.']);
        }

        $subscription->cancel();

        return redirect()->route('account.billing');
    }

    public function pauseSubscription(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        /** @var Subscription $subscription */
        $subscription = $user->subscriptions()->active()->first();

        if (!$subscription) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'You do not have an active subscription.']);
        }

        $subscription->pause();

        return redirect()->route('account.billing');
    }

    public function unpauseSubscription(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        /** @var Subscription $subscription */
        $subscription = $user->subscriptions()->active()->first();

        if (!$subscription) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'You do not have an active subscription.']);
        }

        if (!$subscription->onPausedGracePeriod()) {
            return redirect()
                ->route('account.billing')
                ->withErrors(['error' => 'Subscription must be in a paused state.']);
        }

        $subscription->unpause();

        return redirect()->route('account.billing');
    }
}
