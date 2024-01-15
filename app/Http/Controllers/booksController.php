<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;


class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = books::join('categories', 'books.categoryid', '=', 'categories.categoryid')
            ->select('books.*', 'categories.name AS category_name')
            ->orderby('books.isbn')
            ->get();
        
        return response()->view("books.index", ["books" => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create')->with([]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * use Illuminate\Http\RedirectResponse;
     */
    public function store(Request $request)
    {
        $request->validate(books::rules(), books::messages());
        $request->validate([
            'isbn' => 'required',
            'author' => 'required',
            'title' => 'required',
            'price' => 'required',
        ]);

        $books = new books;
        $books->isbn = $request->isbn;
        $books->author = $request->author;
        $books->title = $request->title;
        $books->price = $request->price;
        $books->categoryid = $request->categoryid;
        $books->save();

        return redirect()->route('books.index')->with([
            'success' => 'Data Buku berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $books = books::join('categories', 'books.categoryid', '=', 'categories.categoryid')
            ->select('books.*', 'categories.name AS category_name')
            ->orderby('books.isbn', 'asc')
            ->get();
        
        return response()->view("books.view", ["books" => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $book = books::where('isbn', $isbn)->first();
        return view('books.edit')->with(['book' => $book]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $isbn)
    {   
        $request->validate([
            'price' => [
                'required',
                'numeric',
            ],
        ], [
            'price.required' => 'The price is required.',
            'price.numeric' => 'The Price field must be numeric.',
        ]);
        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'price' => 'required',
        ]);

        $book = books::find($isbn);
        $book->isbn = $request->isbn;
        $book->author = $request->author;
        $book->title = $request->title;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.index')->with([
            'success' => 'Data Buku berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $book = books::where('isbn',$isbn)->first();
        if(!$book) {
            return redirect()->route('books.index')->with([
                'error' => 'Data Buku tidak ditemukan'
            ]);
        }
        
        $book->delete();

        return redirect()->route('books.index')->with([
            'success' => 'Data Buku berhasil dihapus',
        ]);
    }
}
