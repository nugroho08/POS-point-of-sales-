@extends('layouts.auth')

@section('content')

<div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img src="style/images/Mise.png" class="align-content" alt="Responsive image">
                    </a>
                </div>
                <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Alamat E-mail</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email@gmail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger btn-flat m-b-30 m-t-30">Login</button>
                        
                    </form>
                </div>
            </div>
@endsection

