<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenderFundingRequirementSeeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          if(DB::table('lender_funding_requirements')->count() > 0){
            return;
        }

        $fundingRequirements = [
            ['requirement_name' => 'Invoice/bookout', 'is_active' => true],
            ['requirement_name' => 'Credit App', 'is_active' => true],
            ['requirement_name' => 'Warranty', 'is_active' => true],
            ['requirement_name' => 'Gap', 'is_active' => true],
            ['requirement_name' => 'ATIP', 'is_active' => true],
            ['requirement_name' => 'Insurance Binder', 'is_active' => true],
            ['requirement_name' => 'Membership application', 'is_active' => true],
            ['requirement_name' => 'Maintenance', 'is_active' => true],
            ['requirement_name' => 'Tire and Wheel', 'is_active' => true],
            ['requirement_name' => 'Title App', 'is_active' => true],
            ['requirement_name' => 'Odometer', 'is_active' => true],
            ['requirement_name' => 'Credit Union Addendum', 'is_active' => true],
            ['requirement_name' => 'Buyers Order', 'is_active' => true],
            ['requirement_name' => 'Proof Of Income', 'is_active' => true],
            ['requirement_name' => 'DL', 'is_active' => true],
            ['requirement_name' => '2nd form of ID', 'is_active' => true],
            ['requirement_name' => 'References (5)', 'is_active' => true],
            ['requirement_name' => 'Insurance Card', 'is_active' => true],
            ['requirement_name' => 'Proof Of Residence', 'is_active' => true],
            ['requirement_name' => 'Notice To Cosigner', 'is_active' => true],
            ['requirement_name' => 'Risk Based Pricing', 'is_active' => true],
        ];

        foreach ($fundingRequirements as $requirement) {
            DB::table('lender_funding_requirements')->insert([
                'requirement_name' => $requirement['requirement_name'],
                'is_active' => $requirement['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
