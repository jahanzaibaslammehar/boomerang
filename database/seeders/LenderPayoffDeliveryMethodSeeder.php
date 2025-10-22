<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenderPayoffDeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('lender_payoff_delivery_methods')->count() > 0){
            return;
        }

        $deliveryMethods = [
            ['name' => 'Cheque', 'is_active' => true],
            ['name' => 'Wire', 'is_active' => true],
            ['name' => 'EFT', 'is_active' => true],
        ];

        foreach ($deliveryMethods as $method) {
            DB::table('lender_payoff_delivery_methods')->insert([
                'name' => $method['name'],
                'is_active' => $method['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
