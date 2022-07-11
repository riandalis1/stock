@extends('dashboard.layouts.main')

@section('container')
<article>
      <div class="container">
            <div class="row justify-content-start">
                  <div class="col">
                        <div class="mb-5">
                              <h2 class="my-4 text-center">{{ $post->name }}</h2> 

                              <div class="row mb-3">
                                    <div class="col-md-5">
                                          @if($post->image)
                                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                                          @else
                                                <img src="https://picsum.photos/1000/600" class="img-fluid justify-content-center" alt="{{$post->category->name}}">  
                                          @endif 
                                    </div>
                                    <div class="col-md-6">
                                          <article class="mb-3">
                                                <p><strong>Deskripsi</strong></p>
                                                {!! $post->body !!}
                                          </article>
                                          <p><strong>Harga </strong>: Rp. {{ $post->harga_jual }}</p>
                                          <p><strong>Stok </strong>: {{ $post->quantity }}</p>
                                          <p><strong>Category </strong>: {{ $post->category->name }}</p>
                                          <p><strong>Url </strong>: {{ $post->url_barang }}</p>
                                    </div>
                              </div>
                              <a href="/dashboard/posts" class="text-decoration-none text-primary d-blok"><h5>Back to Product</h5></a>
                        </div>
                  </div>
            </div>
      </div>
</article>
@endsection