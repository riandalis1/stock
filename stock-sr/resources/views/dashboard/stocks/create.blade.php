@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Stock</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/stocks" enctype="multipart/form-data">
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
              <label for="imei" class="form-label">Imei</label>
              <input type="text" class="form-control @error('imei') is-invalid @enderror" id="imei" name="imei" value="{{ old('imei') }}">
              @error('imei')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
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
              <label for="harga_beli" class="form-label">Harga Beli</label>
              <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" value="{{ old('harga_beli') }}" id="harga_beli" name="harga_beli">
              @error('harga_beli')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="diskon_beli" class="form-label">Diskon Beli</label>
              <input type="text" class="form-control @error('diskon_beli') is-invalid @enderror" value="{{ old('diskon_beli') }}" id="diskon_beli" name="diskon_beli">
              @error('diskon_beli')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" name="status">
                <option value="Tersedia">Tersedia</option>
                <option value="Terjual">Terjual</option>
              </select>
              @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="pembeli" class="form-label">Pembeli</label>
              <input type="text" class="form-control @error('pembeli') is-invalid @enderror" value="{{ old('pembeli') }}" id="pembeli" name="pembeli">
              @error('pembeli')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Post Product</button>
        </form>
    </div>
</div>


<!-- SLUG -->
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
</script>
<!-- SLUG -->

@endsection