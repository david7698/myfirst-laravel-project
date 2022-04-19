<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // query per inserire dentro la tabella book
        // $query = "insert into book "

        DB::table('book')->insert([
            [ 'title' => 'Paz Ole 1', 'description' => 'descrizione', 'page_number' => 100],
            [ 'title' => 'Paz Ole 2', 'description' => 'descrizione 2', 'page_number' => 200],
            [ 'title' => 'Paz Ole 3', 'description' => 'descrizione 3', 'page_number' => null],
        ]);
    }
}
