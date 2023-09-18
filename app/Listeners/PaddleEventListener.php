<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Paddle\Events\WebhookReceived;

class PaddleEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        info($event->payload);
        if ($event->payload['alert_name'] === 'payment_succeeded') {

        }
    }
}
