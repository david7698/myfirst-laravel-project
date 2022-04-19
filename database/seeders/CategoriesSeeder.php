<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [ 'name' => 'Azione'],
            [ 'name' => 'Avventura'],
            [ 'name' => 'Classico'],
            [ 'name' => 'Poliziesco'],
            [ 'name' => 'Horror']
        ]);
    }
}
