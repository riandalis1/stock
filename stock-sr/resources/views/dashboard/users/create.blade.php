@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Users</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/users" enctype="multipart/form-data">
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
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" autofocus name="username" 
              value="{{ old('username') }}">
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Ulangi Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
              @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Admin</button>
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