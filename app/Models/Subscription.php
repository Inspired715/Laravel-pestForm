<?php

namespace App\Models;

use Laravel\Paddle\Subscription as CashierSubscription;
use Carbon\Carbon;
use DateTimeInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Laravel\Paddle\Concerns\Prorates;
use LogicException;

class Subscription extends CashierSubscription
{
    // protected $fillable = [
    //     'billable_id', 'billable_type', 'name', 'paddle_id', 'paddle_status',
    //     'paddle_plan', 'quantity', 'trial_ends_at', 'paused_from', 'ends_at'
    // ];

    const STATUS_DELETED = 'canceled';

    protected $casts = [
        'paddle_id' => 'string',
        'paddle_plan' => 'string',
        'quantity' => 'integer',
        'trial_ends_at' => 'datetime',
        'paused_from' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function user()
    {
        return $this->morphTo('billable');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'paddle_plan');
    }


    /*================= */

    public function swap($plan, array $options = [])
    {
        $this->guardAgainstUpdates('swap plans');

        $payload = array_merge($options, [
            'items' => [
                [
                    'price_id' => $plan,
                    'quantity' => 1
                ]
            ]
        ]);

        Cashier::patch('/subscriptions/' . $this->paddle_id, $payload);

        $this->forceFill([
            'paddle_plan' => $plan,
        ])->save();

        $this->paddleInfo = null;

        return $this;
    }


    public function swapAndInvoice($plan, array $options = [])
    {
        return $this->swap($plan, array_merge($options, [
            'proration_billing_mode' => 'full_immediately',
        ]));
    }


    public function lastPayment()
    {
        $payment = $this->paddleInfo()['items'][0];

        return  new Payment($payment['price']['unit_price']['amount'], $payment['price']['unit_price']['currency_code'], $payment['previously_billed_at']);
    }


    public function nextPayment()
    {
        if (! isset($this->paddleInfo()['items'][0]['next_billed_at'])) {
            return;
        }

        $payment = $this->paddleInfo()['items'][0];

        return  new Payment($payment['price']['unit_price']['amount'], $payment['price']['unit_price']['currency_code'], $payment['next_billed_at']);
    }


    public function cancel()
    {
        if ($this->onGracePeriod()) {
            return $this;
        }

        if ($this->onPausedGracePeriod() || $this->paused()) {
            $options = [
                'ends_at' => Carbon::now(),
                'effective_from' => 'immediately'
            ];
        }
        else {
            $options = [
                'ends_at' => $this->nextPayment()->date(),
                'effective_from' => 'next_billing_period'
            ];
        }

        return $this->cancelAt($options);
    }


    public function cancelAt($options)
    {
        $payload = [
            'effective_from' => $options['effective_from'],
        ];

        Cashier::post('/subscriptions/' . $this->paddle_id . '/cancel', $payload );

        $this->forceFill([
            'ends_at' => $options['ends_at'],
        ])->save();

        $this->paddleInfo = null;

        return $this;
    }


    public function pause()
    {
        $payload = [ 'effective_from' => 'next_billing_period'];
        Cashier::post('/subscriptions/' . $this->paddle_id . '/pause', $payload);

        $info = $this->paddleInfo();

        if($info['scheduled_change']['action'] == 'pause') {

            $paused_from = Carbon::parse($info['scheduled_change']['effective_at'])->format('Y-m-d');
            $paused_from = Carbon::createFromFormat('Y-m-d', $paused_from, 'UTC');

            $this->forceFill([
                'paddle_status' => $info['status'],
                'paused_from' => $paused_from,
            ])->save();
        }

        $this->paddleInfo = null;

        return $this;
    }


    public function unpause()
    {
        $payload = [ 'scheduled_change' => null ];
        Cashier::patch('/subscriptions/' . $this->paddle_id, $payload);

        $this->forceFill([
            'paddle_status' => self::STATUS_ACTIVE,
            'ends_at' => null,
            'paused_from' => null,
        ])->save();

        $this->paddleInfo = null;

        return $this;
    }


    public function paddleInfo()
    {
        if ($this->paddleInfo) {
            return $this->paddleInfo;
        }

        return $this->paddleInfo = Cashier::get('/subscriptions/' . $this->paddle_id, [])['data'];
    }

}
