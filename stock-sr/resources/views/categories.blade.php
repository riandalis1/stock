@extends('layouts.main')

@section('container')
    <div class="container mt-5 pt-5 my-content">
        <h1 class="mt-2 text-center">Post Categories</h1>

        <div class="row justify-content-center">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card bg-dark text-white m-3">
                    <a href="/posts?category={{ $category->slug }}">
                        <img src="/img/favicon.jpg"class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center text-white flex-fill p-3 fs-3" style="background-color: rgba(0, 0, 0, 0.5);">{{ $category->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
