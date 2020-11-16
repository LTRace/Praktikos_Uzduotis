<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin admin',
            'email' => 'admin@gmail.com',
            'is_leader' => 1,
            'password' => Hash::make('admin'),
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
