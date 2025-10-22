<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(DB::table('vehicle_type')->count() > 0){
            return;
        }

        $vehicleTypes = [
            ['name' => 'New', 'is_active' => true],
            ['name' => 'Certified', 'is_active' => true],
            ['name' => 'Product Only', 'is_active' => true],
        ];

        foreach ($vehicleTypes as $type) {
            DB::table('vehicle_type')->insert([
                'name' => $type['name'],
                'is_active' => $type['is_active'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
