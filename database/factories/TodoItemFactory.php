<?php

namespace Database\Factories;

use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TodoItem>
 */
class TodoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'item_name' => fake()->realText(20),
            'registration_date' => fake()->date(),
            'expire_date' => fake()->date(),
        ];
    }
}
