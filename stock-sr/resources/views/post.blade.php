
@extends('layouts.main')

@section('container')
      <article>
            <div class="container" style="margin-top:6rem;">
                  <div class="row justify-content-center">
                        <div class="col-md-8">
                              <div>
                                    <h2 class="text-center">{{ $post->name }}</h2> 

                                    @if($post->image)
                                          <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                                    @else
                                          <img src="https://picsum.photos/1000/600" class="img-fluid justify-content-center" alt="{{$post->category->name}}">  
                                    @endif 

                                    <div class="row my-5">
                                          <div class="col-md-6">
                                                <article>
                                                      <p><strong>Deskripsi</strong></p>
                                                      {!! $post->body !!}
                                                </article>
                                          </div>
                                          <div class="col-md-6">
                                                <p><strong>Harga </strong>: Rp. {{ $post->harga_jual }}</p>
                                                <p><strong>Stok </strong>: {{ $post->quantity }}</p>
                                                <p><strong>Category </strong>: <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none text-primary fw-bold">{{ $post->category->name }}</a></p>
                                                <a href="{{ $post->url_barang }}" target="_blank" class="btn btn-success px-4">Beli</a>
                                          </div>
                                    </div>

                                    <a href="/posts" class="text-decoration-none text-primary d-blok mt-3">Back to Product</a>
                              </div>
                        </div>
                  </div>
            </div>
      </article>
@endsection


