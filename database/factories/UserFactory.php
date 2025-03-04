<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PlanNullable;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'profile_picture' => fake()->word(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'plan_nullable_id' => PlanNullable::factory(),
        ];
    }
}
