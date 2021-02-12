<?php

namespace Database\Seeders;

use App\Models\ListCol;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        ListCol::factory(20)->create();
        Todo::factory(20)->create();
    }
}
