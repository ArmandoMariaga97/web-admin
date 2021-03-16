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
            'name' => 'Armando Mariaga Galeano',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234')
        ]);
    }
}
