<!-- Begin Page Content -->
@extends('layouts.default')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title', $title)</h1>
            <a href="/barang" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-back fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-center">
                            <h5>@yield('subtitle', $subtitle)</h5>
                    </div>
                    <div class="card-body">
    
                                <form action="{{ route('barang.update', $barang->id) }}" method="POST" name="add_post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong>Nama Barang</strong>
                                                <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang', $barang->nama_barang) }}" placeholder="Masukan nama kategori...">
                                                <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <strong>Kategori</strong>
                                                <select class="form-control form-select mb-3" id="nama_kategory" name="nama_kategory">
                                                        {{-- <option selected>Choose...</option> --}}
                                                        <option value="{{ old('nama_kategory') }}">{{ $barang->nama_kategory }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>QTY</strong>
                                                <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $barang->qty) }}" placeholder="Masukan nama kategori...">
                                                <span class="text-danger">{{ $errors->first('qty') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                            
                                </form>
                    </div>
                </div>

            </div>
        </div>
        
        

                   
@stop