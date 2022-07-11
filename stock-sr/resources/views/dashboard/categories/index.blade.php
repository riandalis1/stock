@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product Category</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row mb-5">
    <div class="col-md-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Categories Product</a>
        @if($categories->count())
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <!-- Edit -->
                                    <a href="/dashboard/categories/{{ $category->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-white"></i> Edit</a>
                                    <!-- Delete -->
                                    <form action="/dashboard/categories/{{ $category->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Hapus ini akan menghapus semua Post dan Stok yang telah dibuat, Yakin?')"><i class="bi bi-x"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif
    </div>
</div>
@endsection