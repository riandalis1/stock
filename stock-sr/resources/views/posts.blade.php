@extends('layouts.main')

@section('container')
  <div class="container my-content mt-5">
    <h1 class="text-center pt-5 mb-3">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/posts">
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-dark" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    @if($posts->count())
      <div class="card mb-3">
        <!-- https://source.unsplash.com/1600x900/?nature,water -->
        @if($posts[0]->image)
          <div style="max-height:400px; overflow:hidden;">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid mx-auto d-block" alt="{{ $posts[0]->category->name }}">
          </div>
        @else
          <img src="https://picsum.photos/1200/400" class="card-img-top" alt="{{ $posts[0]->name }}">
        @endif
        
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/posts/{{ $posts[0]->id }}" class="text-decoration-none text-dark fw-bold">{{ $posts[0]->name }}</a></h3>
          <p>Category : <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-dark fw-bold">{{ $posts[0]->category->name }}</a></p>
          @if($posts[0]->quantity > 0)
            <p class="text-success" style="margin-top:-15px;">Stock : {{ $posts[0]->quantity }}</p>
          @else
            <p class="text-danger" style="margin-top:-15px;">Stock : {{ $posts[0]->quantity }}</p>
          @endif
          <a href="/posts/{{ $posts[0]->id }}" class="btn btn-outline-primary">Info lengkap..</a>
        </div>
      </div>
    
      <article class="mt-3 mb-3 pb-4">
        <div class="row justify-content-center">

          @foreach($posts->skip(1) as $post)
          <div class="col-md-4 mt-3 mb-3 text-center">
            <div class="card">

              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
              @else
                <img src="/img/no_img.png" class="card-img-top" alt="{{ $post->name }}">
              @endif
              
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark fw-bold">
                    {{ $post->name }}
                  </a>
                </h5>
                <p>Category : <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-dark fw-bold">{{ $post->category->name }}</a></p>
                @if($post->quantity > 0)
                  <p class="text-success" style="margin-top:-15px;">Stock : {{ $post->quantity }}</p>
                @else
                  <p class="text-danger" style="margin-top:-15px;">Stock : {{ $post->quantity }}</p>
                @endif
                <a href="/posts/{{ $post->id }}" class="btn btn-outline-primary">Info lengkap..</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </article>
    </div>
  @else
    <p class="text-center fs-4">No post found.</p>
  @endif

  <div class="container text-center">
    {{ $posts->links() }}
  </div>
@endsection
