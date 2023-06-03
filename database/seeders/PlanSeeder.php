<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plans = [
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'stripe_plan' => 'price_1MWTf9KNsPpoql9XFqLsML7V',
                'price' => 4.99,
                'description' => '1 month'
            ],
            [
                'name' => 'Quarterly',
                'slug' => 'quarterly',
                'stripe_plan' => 'price_1MWTiGKNsPpoql9XNPz9KXsJ',
                'price' => 11.99,
                'description' => '3 month'
            ],
            [
                'name' => 'Annual',
                'slug' => 'annual',
                'stripe_plan' => 'price_1MWTj4KNsPpoql9X6uuRJcSJ',
                'price' => 49.99,
                'description' => '1 year'
            ]
        ];
        
        foreach($plans as $plan) {
            Plan::create($plan);
        }
    }
}