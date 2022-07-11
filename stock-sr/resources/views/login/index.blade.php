@extends('layouts.main')

@section('container')
<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top: 120px;">
        <div class="col-lg-4">
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin">
                <form action="/login" method="post" class="mx-3">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email')}}">
                        <label for="email">Email address</label> 
                        @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </main>
        </div>
    </div>
</div>
@endsection()