<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Laravel\Paddle\Cashier;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('subscription_plans') as $paddle_id => $data) {
            $price = Cashier::productPrices($paddle_id)->first();

            Plan::updateOrCreate([
                'paddle_id' => $data['paddle_id'],
            ],[
                'internal_name' => $data['name'],
                'max_forms' => $data['max_forms'],
                'price' => $price,
            ]);
        }
    }
}
