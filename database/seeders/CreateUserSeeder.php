<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeeder extends Seeder
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
                'username'=>'user',
                'firstname'=>'user',
                'middlename'=>'user',
                'lastname'=>'user',
                'phonenumber'=>'09565634097',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('password'),
                'role'=> 0
            ],
            [
                'username'=>'admin',
                'firstname'=>'admin',
                'middlename'=>'admin',
                'lastname'=>'admin',
                'phonenumber'=>'09565634097',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('password'),
                'role'=> 1
            ],
            [
                'username'=>'superadmin',
                'firstname'=>'superadmin',
                'middlename'=>'superadmin',
                'lastname'=>'superadmin',
                'phonenumber'=>'09565634097',
                'email'=>'superadmin@gmail.com',
                'password'=>bcrypt('password'),
                'role'=> 2
            ]
        ];
        foreach($user as $users)
        {
            User::create($users);
        }
    }
}