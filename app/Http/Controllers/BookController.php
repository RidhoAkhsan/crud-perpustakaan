<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();

        return view('pages.admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
    
        return view('pages.admin.book.create', compact('categories'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|numeric',
        ]);

        $book = Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'number' => $request->number,
        ]);

        if ($book) {
            return redirect()->route('dashboard.book.index')->with([
                'success' => 'Data Berhasil Disimpan!'
            ]);
        } else {
            return redirect()->route('dashboard.book.index')->with([
                'error' => 'Data Gagal Disimpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('pages.admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $category = Category::orderBy('name', 'ASC')->get();

        return view('pages.admin.book.edit', compact('book', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|numeric',
        ]);
    
        $book = Book::findOrFail($id);
    
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->slug = Str::slug($request->title, '-');
        $book->description = $request->description;
        $book->number = $request->number;
        
        if ($book->save()) {
            return redirect()->route('dashboard.book.index')->with([
                'success' => 'Data Berhasil Disimpan!'
            ]);
        } else {
            return redirect()->route('dashboard.book.index')->with([
                'error' => 'Data Gagal Disimpan'
            ]);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //! Fungsi untuk menghaspus data
                $book = Book::findOrFail($id);
                $book->delete();
        
                if ($book) {
                    // Return redirect dengan pesan sukses
                    return redirect()->route('dashboard.book.index')->with([
                        'success'   =>  'Data Berhasil Di Hapus'
                    ]);
                } else {
                    // Return redirect dengan pesan error
                    return redirect()->route('dashboard.book.index')->with([
                        'error'   =>  'Data Gagal Di Hapus'
                    ]);
                }
    }
}
