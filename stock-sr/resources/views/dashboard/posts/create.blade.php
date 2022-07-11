@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Posts</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" autofocus name="name" 
              value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        @if( old('category_id') == $category->id )
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <img class="img-preview img-fluid pb-3 pe-5 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <div class="mb-3">
              <label for="harga_jual" class="form-label">Harga Jual</label>
              <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" value="{{ old('harga_jual') }}" id="harga_jual" name="harga_jual">
              @error('harga_jual')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="text" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" id="quantity" name="quantity">
              @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="url_barang" class="form-label">URL Barang</label>
              <input type="text" class="form-control @error('url_barang') is-invalid @enderror" value="{{ old('url_barang') }}" id="url_barang" name="url_barang">
              @error('url_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Create Post Product</button>
        </form>
    </div>
</div>


<script>

    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    name.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection