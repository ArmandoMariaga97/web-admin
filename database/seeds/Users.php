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
                'name' => 'Hernan Ramos',
                'email' => 'hernan@alergologosmonteria.com',
                'avatar' => 'default.png',
                'password' => Hash::make('DoctorHernan#')
            ]);
            User::create([
                'name' => 'Yania Díaz',
                'email' => 'yania@alergologosmonteria.com',
                'avatar' => 'default.png',
                'password' => Hash::make('DraYania#')
        ]);
    }
}
