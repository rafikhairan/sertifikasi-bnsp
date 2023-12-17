@extends('layouts.auth')

@section('content')
<div class="min-vh-100 row justify-content-center align-items-center">
    <div class="col-5">
        <div class="card px-3 py-2 shadow">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Daftar Aplikasi PMB</h5>
                <form accept="{{ route('auth.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama anda">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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
                    <div class="mb-4">
                        <label for="password-confirmation" class="form-label">Konfrimasi Password</label>
                        <input type="password" class="form-control {{ $errors->hasAny('password', 'password_confirmation') ? 'is-invalid' : '' }}" id="password-confirmation" name="password_confirmation" placeholder="Masukkan password anda">
                        @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                        @else
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                        @endif
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    <div class=" text-center">
                        <span>Sudah punya akun? <a href="{{ route('login') }}">Login</a></span>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection