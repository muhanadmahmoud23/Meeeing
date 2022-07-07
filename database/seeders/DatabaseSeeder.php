<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('rates')->insert(['country' => 'US', 'rate' => '2']);
        DB::table('rates')->insert(['country' => 'UK', 'rate' => '3']);
        DB::table('rates')->insert(['country' => 'CN', 'rate' => '2']);

        DB::table('items')->insert(['type' => 'tshirt', 'price' => '30.99', 'weight' => '0.2']);
        DB::table('items')->insert(['type' => 'blouse', 'price' => '10.99', 'weight' => '0.3']);
        DB::table('items')->insert(['type' => 'pants',   'price' => '64.99', 'weight' => '0.9']);
        DB::table('items')->insert(['type' => 'sweatpants', 'price' => '84.99', 'weight' => '1.1']);
        DB::table('items')->insert(['type' => 'jacket', 'price' => '199.99', 'weight' => '2.2']);
        DB::table('items')->insert(['type' => 'shoes', 'price' => '79.99', 'weight' => '1.3']);
    }
}
