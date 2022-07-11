@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product Posts</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row mb-5">
    <div class="col">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Posts Product</a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration + $posts->firstItem() - 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @if($post->category->name)
                                    {{ $post->category->name }}
                                @else
                                    <p>kosong</p>
                                @endif
                            </td>
                            <td>
                                <!-- Add -->
                                <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-info"><i class="bi bi-eye text-white"></i></a>
                                <!-- Edit -->
                                <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                                <!-- Delete -->
                                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container text-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection