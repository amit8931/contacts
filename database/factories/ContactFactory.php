<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    public function definition(): array
    {
        $stages = ['lead', 'customer', 'partner', 'vendor', 'prospect'];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->e164PhoneNumber(),
            'company' => $this->faker->company(),
            'job_title' => $this->faker->jobTitle(),
            'website' => $this->faker->url(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->optional(0.4)->dateTimeBetween('-60 years', '-20 years'),
            'lifecycle_stage' => $this->faker->randomElement($stages),
            'facebook' => $this->faker->optional(0.3)->userName(),
            'twitter' => $this->faker->optional(0.3)->userName(),
            'linkedin' => $this->faker->optional(0.5)->userName(),
            'notes' => $this->faker->optional(0.6)->paragraph(),
            'last_contacted_at' => $this->faker->optional(0.7)->dateTimeBetween('-90 days', 'now'),
        ];
    }
}
