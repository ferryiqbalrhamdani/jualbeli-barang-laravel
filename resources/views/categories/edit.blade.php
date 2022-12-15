<!-- Begin Page Content -->
@extends('layouts.default')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title', $title)</h1>
            <a href="/category" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-back fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <div class="row d-flex justify-content-center">
            <div class="col6">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-center">
                            <h5>@yield('subtitle', $subtitle)</h5>
                    </div>
                    <div class="card-body">
    
                                <form action="{{ route('category.update', $category->id) }}" method="POST" name="add_post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong>Name</strong>
                                                <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" value="{{ old('name', $category->name) }}" placeholder="Masukan nama kategori...">
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
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