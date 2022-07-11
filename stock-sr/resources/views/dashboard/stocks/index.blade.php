@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product Stocks</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif


<div class="row mb-5">
    <div class="col">
        <a href="/dashboard/stocks/create" class="btn btn-primary mb-3">Create New Stocks Product</a>
        @if($stocks->count())
            <div class="table-responsive">
                <table class="table table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                            <tr class="<?php if($stock->status == "Terjual") echo 'table-secondary' ?>">
                                <td>{{ $loop->iteration + $stocks->firstItem() - 1 }}</td>
                                <td>{{ $stock->name }}</td>
                                <td>{{ $stock->user->name }}</td>
                                <td>{{ $stock->status }}</td>
                                <td>
                                    @if($stock->category->name)
                                        {{ $stock->category->name }}
                                    @else
                                        <p>kosong</p>
                                    @endif
                                </td>
                                <td>
                                    <!-- View -->
                                    <a href="/dashboard/stocks/{{ $stock->id }}" class="badge bg-info"><i class="bi bi-eye text-white"></i></a>
                                    <!-- Edit -->
                                    <a href="/dashboard/stocks/{{ $stock->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square text-white"></i></a>
                                    <!-- Delete -->
                                    <form action="/dashboard/stocks/{{ $stock->id }}" method="post" class="d-inline">
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
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif
    </div>
    <div class="container text-center">
        {{ $stocks->links() }}
    </div>
</div>
@endsection