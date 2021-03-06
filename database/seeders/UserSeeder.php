<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

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
            'uuid' => Uuid::uuid4(),
            'role' => 'admin',
            'name' => 'admin',
            'default' => 123456,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'uuid' => Uuid::uuid4(),
            'role' => 'user',
            'name' => 'user',
            'default' => 123456,
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);
    }
}
