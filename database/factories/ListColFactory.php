<?php

namespace Database\Factories;

use App\Models\ListCol;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListColFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListCol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $id = $user->id;
        $user->list_count++;
        return [
            'title' => $this->faker->name(),
            'description' =>  rand(0, 2) >= 1 ? $this->faker->text(40) : null,
            'user_id' => $id,


            //
        ];
    }
}
