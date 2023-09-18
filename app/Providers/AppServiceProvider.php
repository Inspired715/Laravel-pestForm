<?php

namespace App\Providers;

use App\Models\Subscription;
use Illuminate\Support\ServiceProvider;
use Laravel\Paddle\Cashier;
use Laravel\Paddle\Receipt;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Cashier::useReceiptModel(Receipt::class);
        Cashier::useSubscriptionModel(Subscription::class);

        //
    }
}
