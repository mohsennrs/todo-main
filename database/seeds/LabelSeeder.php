<?php

use Hattori\ToDo\Models\User;
use Hattori\ToDo\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Label::class, 10)->create([
            'user_id' => User::first()->id
        ]);
    }
}
