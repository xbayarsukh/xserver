<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ArrivalRecord;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArrivalRecord>
 */
class ArrivalRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specificUser = User::find(28);
        return [
            'user_id' => $specificUser->id,
            'recorded_at' => $this->faker->dateTimeBetween('-1 month'), // Random date between 1 year ago and now
        ];
    }
}
