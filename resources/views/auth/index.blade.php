@extends('layouts.auth')

@section('content')
<div class="min-vh-100 row justify-content-center align-items-center">
    <div class="col-4">
        <div class="card px-3 py-2 shadow">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Login Aplikasi PMB</h5>
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('auth.authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email anda">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password anda">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-end">
                        <a href="" class="text-decoration-none">Lupa password?</a>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class=" text-center">
                        <span>Belum punya akun? <a href="{{ route('auth.register') }}">Daftar</a></span>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection