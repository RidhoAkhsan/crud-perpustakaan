<?php

namespace App\Http\Controllers;

use App\Models\BookGallery;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        $items = $book->galleries()->get();

        return view('pages.admin.book_gallery.index', compact('book', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('pages.admin.book_gallery.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $files = $request->file('files');

        foreach ($files as $file) {
            $file->storeAs('public/books/', $file->hashName());

            $book->galleries()->create([
                'books_id'  =>  $book->id,
                'url'   =>  $file->hashName(),
            ]);
        }

        if ($book) {
            return redirect()->route('dashboard.book.gallery.index', $book->id)->with([
                'success'   =>  'Data berhasil ditambahkan!'
            ]);
        } else {
            return redirect()->route('dashboard.book.gallery.index', $book->id)->with([
                'error' =>  'Data gagal ditambahkan!'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, BookGallery $gallery)
    {
        //! Fungsi yang digunakan untuk melakukan perintah hapus atau delete
        // get data product
        $book = $book->find($gallery->books_id);

        // get book gallery
        $gallery = $book->galleries->find($gallery->id);

        // delete gambar dari
        Storage::delete('public/books/' . basename($gallery->url));

        // delete gambar book gallery
        $gallery->delete();

        if ($gallery) {
            return redirect()->route('dashboard.book.gallery.index', $gallery->books_id)->with([
                'success' => 'Data berhasil dihapus'
            ]);
        } else {
            return redirect()->route('dashboard.book.gallery.index', $gallery->books_id)->with([
                'error' => 'Data gagal dihapus'
            ]);
        }
    }
}
