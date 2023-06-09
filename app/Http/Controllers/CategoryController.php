<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('pages.admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
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
            'name'  =>  'required|string|max:255',
        ]);

        $category = Category::create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name),
        ]);

        if ($category) {
            return redirect()->route('dashboard.category.index')->with([
                'success'   =>  'Data Berhasil Disimpan!'
            ]);
        } else {
            return redirect()->route('dashboard.category.index')->with([
                'error' =>  'Data Gagal Disimpan'
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
        $category = Category::findOrFail($id);

        return view('pages.admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('pages.admin.category.edit', compact('category'));
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
            'name'  =>  'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        if ($category) {
            return redirect()->route('dashboard.category.index')->with([
                'success'   =>  'Data Berhasil Diperbarui'
            ]);
        } else {
            return redirect()->route('dashboard.category.index')->with([
                'srror' =>  'Data Gagal Diperbarui'
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
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return redirect()->route('dashboard.category.index')->with([
                'success' => 'Data berhasil dihapus'
            ]);
        } else {
            return redirect()->route('dashboard.category.index')->with([
                'error' => 'Gagal menghapus data'
            ]);
        }
    }
}
