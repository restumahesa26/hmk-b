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
        User::create([
            'name' => 'Mufti Restu Mahesa', 
            'email' => 'mufti.restumahesa@gmail.com', 
            'roles' => 'ADMIN', 
            'password' => Hash::make('password')
        ]);
    }
}
