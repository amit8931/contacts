<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Group>
 */
class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true),
            'color' => $this->faker->randomElement(['#a855f7', '#3b82f6', '#10b981', '#f59e0b', '#ef4444']),
        ];
    }
}
