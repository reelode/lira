<?php

namespace Database\Factories;

use App\Models\ListCol;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->streetAddress,
            'description' => rand(0, 2) > 1 ? $this->faker->text(15) : null,
            'user_id' => User::inRandomOrder()->value('id'),
            'list_col_id' => ListCol::inRandomOrder()->value('id'),
            'y_position' => $this->faker->randomNumber()
        ];
    }
}
