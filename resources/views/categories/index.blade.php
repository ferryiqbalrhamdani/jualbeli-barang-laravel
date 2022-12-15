<!-- Begin Page Content -->
@extends('layouts.default')

@section('content')

    <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title', $title)</h1>
            <a href="/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
        </div>
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif

        <!-- Content Row -->
        
            <div class="card shadow">
                <div class="card-header ">
                    <form class=" form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search d-flex justify-content-between">
                        <h5>@yield('subtitle', $subtitle)</h5>
                        <div class="input-group shadow">
                            <input type="text" class="form-control bg-white border-0 small" name="q" value="{{ $q }}" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Di Ubah</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($category as $c)
                                <tr>
                                    <th scope="row" class="text-center"><?= $i++; ?></th>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('category.edit', $c->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit fa-sm text-white-50"></i> Edit Data</a> |
                                        <form method="POST" action="{{ route('category.destroy', $c->id) }}"style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah and ingin menghapus data {{ $c->name }}?')"><i class="fas fa-trash fa-sm text-white-50 show_confirm"></i> Hapus Data</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $category->links() !!}
                </div>
            </div>
        
        

                   
@stop