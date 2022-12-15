<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use Redirect;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Barang';
        $data['subtitle'] = 'Data Barang';
        $data['barang'] = Barang::orderBy('id','desc')->paginate(10);
        return view('barang.index', $data);
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
        $categories = Category::all();

        return view('barang.create', compact('categories'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'nama_barang' => 'required',
            'nama_kategory' => 'required',
            'qty' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'desc' => 'required'
        ]);

        $harga_beli = $request->post('harga_jual') * 20/100;

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_kategory' => $request->nama_kategory,
            'qty' => $request->qty,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $harga_beli,
            'desc' => 'required'
        ]);


        //redirect to index
        return redirect()->route('barangs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Barang $barang)
    {
        $data['title'] = 'Edit category';
        $data['barang'] = $barang;
        $data['subtitle'] = 'Form Ubah Data';
        $categories = Category::all();

        return view('barang.edit', compact('barang'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'nama_kategory' => 'required',
            'qty' => 'required'
        ]);
 
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'nama_kategory' => $request->nama_kategory,
            'qty' => $request->qty
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('barang')->with('success', 'Data barang berhasil dihabpus');
    }
}
