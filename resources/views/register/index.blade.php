@extends ('layout.loginregister')

@section('content')
    <div class="card m-auto mt-5">
        <main class="form-signin w-100 ">
            <form action="/register" method="post" class="mx-5 px-2 mb-5">
                @csrf
                <h1 class="h3 mb-3 mt-5 fw-normal">Green</h1>
                <div class="form-floating mb-2">
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name')}}" placeholder="Enter your full name here" @error('name') is-invalid
                    @enderror>
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                    <input type="password" id="password" name="password" class="form-control" 
                    value="{{ old('name')}}" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                    class="form-control" placeholder="Password" required>
                    <label for="password_confirmation">Confirm Password</label>
                </div>

                <br>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign Up</button>
                <br>
                <br>
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </form>
        </main>
    </div>
@endsection