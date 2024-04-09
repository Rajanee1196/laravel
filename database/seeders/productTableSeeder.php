<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('product')->insert([
            'title' => "abc",
            'author' => "test",
            'created_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
