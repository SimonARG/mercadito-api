<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basic = Plan::create([
            'name' => 'basic',
            'monthly_buy_tokens' => 5,
            'monthly_sell_tokens' => 5
        ]);

        $premium = Plan::create([
            'name' => 'premium',
            'monthly_buy_tokens' => 100,
            'monthly_sell_tokens' => 100
        ]);
    }
}
