<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'Armando Mariaga',
                'email' => 'jamg.code07@gmail.com',
                'avatar' => 'default.png',
                'password' => Hash::make('jamg.2022#')
            ]);
    }
}
