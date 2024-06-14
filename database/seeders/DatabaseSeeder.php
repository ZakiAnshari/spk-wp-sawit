<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Roles;
use App\Models\User;
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

        $data = [
            'name' => 'admin',
        ];
        Roles::create($data);

        $data = [
            'username' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123')
        ];
        User::create($data);

        
    }
}
