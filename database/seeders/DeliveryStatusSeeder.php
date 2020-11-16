<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_statuses')->insert([
            'name' => 'created',
            'created_at' => now(),
        ]);

        DB::table('delivery_statuses')->insert([
            'name' => 'delivering',
            'created_at' => now(),
        ]);

        DB::table('delivery_statuses')->insert([
            'name' => 'delivered',
            'created_at' => now(),
        ]);

        DB::table('delivery_statuses')->insert([
            'name' => 'cancelled',
            'created_at' => now(),
        ]);
    }
}
