<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\AccountNullableUserCategoriesNullable;
use App\Models\Transaction;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->numberBetween(-10000, 10000),
            'is_payment' => fake()->boolean(),
            'account_nullable_user_categories_nullable_id' => AccountNullableUserCategoriesNullable::factory(),
        ];
    }
}
