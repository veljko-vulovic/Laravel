<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'role_name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'SuperAdmin',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'User',
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Guest',
        ]);
        \App\Models\User::factory(10)->create();

    }
}
