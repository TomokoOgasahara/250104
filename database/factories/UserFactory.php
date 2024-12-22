<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'name_kana' => 'タナカ タロウ', // 手動で指定（またはカスタムプロバイダを使用）
            'email' => $this->faker->email,
            'pref' => $this->faker->state, // Fakerには標準の都道府県プロバイダがないため代替
            'job' => $this->faker->jobTitle,
            'comp_univ' => $this->faker->company,
            'dep' => $this->faker->word,
            'birth' => $this->faker->date,
        ];
    }
}
