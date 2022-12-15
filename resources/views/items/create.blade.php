<!-- Begin Page Content -->
@extends('layouts.default')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title', $title)</h1>
            <a href="/item" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-back fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-center">
                            <h5>@yield('subtitle', $subtitle)</h5>
                    </div>
                    <div class="card-body">
    
                                <form action="{{ route('item.store') }}" method="POST" name="add_post">
                                    {{ csrf_field() }}
                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong>Nama Barang</strong>
                                                <input type="text" name="nama_barang" class="form-control" placeholder="Masukan nama Barang..." value="{{ old('nama_barang') }}">
                                                <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <strong>Kategori</strong>
                                                <select class="form-control form-select mb-3" id="nama_kategory" name="nama_kategory">
                                                    @forelse ($categories as $c)
                                                        {{-- <option selected>Choose...</option> --}}
                                                        <option value="{{ old('nama_kategory') }}">{{ $c->name }}</option>
                                                    @empty
                                                        <option value="" class="alert alert-danger">Data Kategori belum Tersedia.</option>
                                                        @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <strong>QTY</strong>
                                                <input type="text" name="qty" class="form-control" placeholder="Masukan jumlah Barang..."  value="{{ old('qty') }}">
                                                <span class="text-danger">{{ $errors->first('qty') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <strong>Harga Jual</strong>
                                                <input type="text" name="harga_jual" class="form-control" placeholder="Masukan jumlah harga..."  value="{{ old('harga_jual') }}">
                                                <span class="text-danger">{{ $errors->first('harga_jual') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <strong>Deskripsi</strong>
                                                <textarea class="form-control" name="desc" rows="5" placeholder="Masukkan deskripsi produk"  value="{{ old('desc') }}"></textarea>
                                                <span class="text-danger">{{ $errors->first('desc') }}</span>
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