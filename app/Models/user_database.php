<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IconFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'name_kana' => $this->faker->sentence(),
            'pref' => $this->faker->sentence(),
            'job' => $this->faker->sentence(),
            'comp_univ' => $this->faker->sentence(),
            'dep' => $this->faker->sentence(),
            'birth' => $this->faker->sentence(),            
        ];
    }
}

