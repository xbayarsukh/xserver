<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ArrivalRecord;
use App\Models\DepartureRecord;
use Illuminate\Database\Seeder;

class ArrivalDepartureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArrivalRecord::factory()->count(10)->create(); // Create 500 arrival records
        DepartureRecord::factory()->count(10)->create(); // Create 400 departure records
    }
}
