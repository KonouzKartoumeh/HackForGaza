<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User; // Import the User model


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {
         User::create([
             'name' => 'admin',
             'email' => 'admin@demo.com',
             'password' => bcrypt('12341234'), // Hash the password using bcrypt
             'is_admin' => 1,
         ]);
     }
}
