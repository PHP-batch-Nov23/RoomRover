<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // For Create Admin uncomment this and then Seed FileD
        User::factory()->admin()->create([
            'full_name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'contact' => 9456784158,
        'is_approved' =>1,
            'password' => bcrypt('admin@1234')
        ]);

        User::factory()->count(3)->create();
    }
}
