<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Barang;
use Redirect;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Kategori';
        $data['subtitle'] = 'DataKategori';
        $data['category'] = Category::orderBy('id','desc')->paginate(10);
        $data['q'] = $request->get('q');
        $data['categorys'] = Category::where('name', 'like', '%' . $data['q'] . '%')->get();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Data';
        $data['subtitle'] = 'Form Tambah Data';
        return view('categories.create', $data);
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
            'name' => 'required'
        ]);
 
        Category::create([
            'name' => $request->name
        ]);
    
        return Redirect::to('category')->with('success','Data berhasil ditambah.');
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
    public function edit(Category $category)
    {
        $data['title'] = 'Edit category';
        $data['category'] = $category;
        $data['subtitle'] = 'Form Ubah Data';
        return view('categories.edit', compact('category'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);
 
        $category->update([
            'name' => $request->name
        ]);

        return Redirect::to('category')->with('success','Data berhasil diubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('category')->with('success', 'Kategory berhasil dihabpus');
    }
}
