@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Admin</h1>
</div>

<div class="row mb-5">
    <div class="col-lg-8">
        <form method="post" action="/dashboard/users/{{ $user->id }}">
            @method('put')
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" autofocus name="name" 
              value="{{ old('name', $user->name) }}">
              @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}">
              @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" id="email" name="email">
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <a href="/dashboard/users" class="btn btn-success"> <i class="bi bi-arrow-left me-2"></i>Back to all Admin</a>
            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>
</div>

@endsection