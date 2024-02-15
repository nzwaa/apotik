<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import model User

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data to users table
        User::create([
            'email' => 'nazwasitiruqayyah@gmail.com',
            'password' => bcrypt('nazwa123'),
            'name' => 'Awa',
        ]);
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'name' => 'Admin',
        ]);
    }
}
