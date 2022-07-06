<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'avitaind@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('AvitaIndia@1234'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('User@1234'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
