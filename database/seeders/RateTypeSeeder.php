<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('rate_type')->count() > 0){
            return;
        }

        $rateTypes = [
            ['name' => 'Fixed', 'is_active' => true],
            ['name' => 'Whole Sale', 'is_active' => true],
        ];

        foreach ($rateTypes as $type) {
            DB::table('rate_type')->insert([
                'name' => $type['name'],
                'is_active' => $type['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
