@extends('layout.loginregister')

@section('content')
    <div class="card m-auto mt-5">
        <main class="form-signin w-100 ">
            <form action="{{ route('authenticate') }}" method="post" class="mx-5 px-2 mb-5">
                    @csrf
            <h1 class="h3 mb-3 mt-5 fw-normal">Please sign in</h1>
            
            <div class="form-floating mb-2">
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}" placeholder="name@example.com"  @error('email') is-invalid
                    @enderror>
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="form-floating mb-2">
                    <input type="password" id="password" name="password" class="form-control" value="{{ old('name')}}" placeholder="Password" required>
                    <label for="password">Password</label>
            </div>
            
            <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                    </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <br>
            <br>
                Don't have an account? <a href="{{ route('register') }}" class="">Register here</a>
                <br>
                <a href="{{ url('auth/google') }}" class="btn btn-primary margin-10" role="button" id="btn-glogin"><i class="fab fa-google" aria-hidden="true"></i>&nbsp;Google</a>
                <a href="{{ url('auth/twitter') }}" class="btn btn-primary " role="button"><i class="fab fa-twitter" aria-hidden="true"></i>&nbsp;Twitter</a>
            </form>
        </main>
    </div>
@endsection