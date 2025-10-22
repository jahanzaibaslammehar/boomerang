<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenderPayoffRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('lender_payoff_requirements')->count() > 0){
            return;
        }

        $payoffRequirements = [
            ['requirement_name' => 'Account Number', 'is_active' => true],
            ['requirement_name' => 'VIN', 'is_active' => true],
            ['requirement_name' => 'Payoff Good-through Date', 'is_active' => true],
            ['requirement_name' => 'Per Diem', 'is_active' => true],
        ];

        foreach ($payoffRequirements as $requirement) {
            DB::table('lender_payoff_requirements')->insert([
                'requirement_name' => $requirement['requirement_name'],
                'is_active' => $requirement['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
