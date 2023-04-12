<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['id' => 1], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(11111111)
        ]);
    }
}
