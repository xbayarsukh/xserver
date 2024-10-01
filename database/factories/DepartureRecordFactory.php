<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ArrivalRecord;
use App\Models\DepartureRecord;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DepartureRecord>
 */
class DepartureRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specificArrivalRecords = ArrivalRecord::all(); // Get all arrival records

        // Generate a random arrival record from the collection
        $randomArrivalRecord = $specificArrivalRecords->random();

        // Get the recorded_at timestamp of the random arrival record
        $arrivalRecordDate = $randomArrivalRecord->recorded_at;

        // Define the start and end dates for the departure records for one month after the arrival record
        $startDate = Carbon::parse($arrivalRecordDate)->subMonth();
        $endDate = Carbon::parse($arrivalRecordDate);

        return [
            'arrival_id' => $randomArrivalRecord->id,
            'recorded_at' => $this->faker->dateTimeBetween($startDate, $endDate),
        ];
    }
}
