<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'manager',
            'created_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'supplier',
            'created_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'executive',
            'created_at' => now(),
        ]);
    }
}
