<?php

namespace App\Console\Commands;

use App\Models\Books;
use Illuminate\Console\Command;

class CreateBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paz:crea-book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'comando per creare un libro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask("qual'è il titolo del libro?");
        $description = $this->ask("inserisci una descrizione?");
        $category = $this->ask("di che genere è il libro");
        $pages = $this->ask("quante pagine ha il libro?");


        $book = new Books;

        $book->title = $title;

        $book->description = $description;

        $book->page_number = $pages;

        $book->id_category = $category;

        $book->save();
        
       
    }
}
