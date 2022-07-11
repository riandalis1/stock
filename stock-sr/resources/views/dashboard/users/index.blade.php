@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif


<div class="row mb-5">
    <div class="col-lg-6">
        <a href="/dashboard/users/create" class="btn btn-primary mb-3">Create New Admin Product</a>
        @if($users->count())
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <!-- View -->
                                    <a href="/dashboard/users/{{ $user->id }}" class="badge bg-info"><i class="bi bi-eye text-white"></i></a>
                                    <!-- Edit -->
                                    <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                                    <!-- Delete -->
                                    <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
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
    <div class="container text-center">
        {{ $users->links() }}
    </div>
</div>
@endsection