<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Admin',
                'email'=>'Admin@gmail.com',
                'password'=>bcrypt('admin'),
                'role'=>'Admin'
            ]
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
