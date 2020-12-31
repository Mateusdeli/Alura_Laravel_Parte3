<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CriarUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mateus',
            'email' => 'mateus_forlevesi@hotmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
