<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Models\Books;
use App\Models\Category;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;

class BookController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function test()
    {
        $players = [
            'portiere' => 'Gigi Buffon',
            'difensore' => 'Leonardo Bonucci',
            'centrocampista' => 'Andrea Pirlo',
            'attaccante' => 'Carlos Tevez',
        ];

        return view('user.profile', [
            'players' => $players
        ]);
    }

    public function allBooks()
    {

        // query per estrarre tutti i libri
        $query = DB::table('book');
        return view('libri', [
            'libri' => DB::table('book')->get()
        ]);
    }

    public function getDetailBook($bookId)
    {
        $book = DB::table('book')->where('id', '=', $bookId)->first();
        return view('modify', [
            'book' => $book
        ]);
    }


    public  function eloquent_allbooks()
    {
        $books = Books::with(['category', 'comments'])->get();

        return view('biblioteca', [
            'books' => $books
        ]);


        /* foreach (books::all() as $book2) {
            echo $book2->title;
        }
        */
    }

    public function create(FormBuilder $formBuilder)
    {




        $form = $formBuilder->create(
            'App\Forms\BookForm',
            [
                'method' => 'POST',
                'url' => route('book.store')
            ]
            //  , [ 'categories' => $category]
        );

        return view('createbook', compact('form'));
    }


    public function store(BookStoreRequest $req)
    //public function store(Request $req)
    {


        //$req->validate();

        $id_cat = $req->category;


        $book = new Books;

        $book->title = $req->title;

        $book->description = $req->description;

        $book->page_number = $req->page_number;

        $book->id_category = $id_cat;

        $book->save();


        return redirect('biblioteca');
    }

    public function delete_book($bookId)
    {

        // DB::delete('delete from book where id = ?' [$bookId]);

        // books::remove()->where('id',$bookId);

        $book = Books::find($bookId);

        $book->delete();

        return redirect('biblioteca');
    }


    public function edit(FormBuilder $formBuilder, $bookId)
    {
        $book = Books::findOrFail($bookId);


        $form = $formBuilder->create('App\Forms\BookForm', [
            'method' => 'POST',
            'url' => route('book.update', ['bookId' => $bookId]),
            'model' => $book,
        ]);

        return view('modify', [
            'form' => $form,

        ]);

        /*

        return view('modify', [
            
        ]);
        */
    }


    public function update(BookStoreRequest $req, $bookId)
    {


        $book = Books::find($bookId);

        $book->title = $req->title;

        $book->description = $req->description;

        $book->page_number = $req->page_number;

        $book->save();

        return redirect('biblioteca');
    }

    public function detail_book($bookId)
    {


        $book = Books::find($bookId);

        $comments = $book->comments()->orderBy('created_at', 'desc')->get();
        return view('detailbook', [
            'book' => $book,
            'comments' => $comments
        ]);
    }


    public function comment_book(Request $req, $bookId)
    {

        $comment = new Comments(['comment' => $req->text]);

        $book = Books::find($bookId);

        $book->comments()->save($comment);

        return redirect('biblioteca');
    }
}
