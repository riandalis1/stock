@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Stock</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nama Category</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" autofocus name="name" 
              value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
              @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Category Product</button>
        </form>
    </div>
</div>

<!-- SLUG -->
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function(){
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
<!-- SLUG -->

@endsection