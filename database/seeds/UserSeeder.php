<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class, 1)->create([
            'name' => 'Mohsen',
            'email' => 'mohsen.nurisa@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
