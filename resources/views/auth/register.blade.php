@extends('frontend.include.app')

@section('content')

    <div class="page-content page-auth mt-5" id="register" style="padding-top:50px">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h2>
                                Memulai untuk jual beli <br />
                                dengan cara terbaru
                            </h2>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-success btn-block mt-4">
                                Sign Up Now
                            </button>
                        </form>
                        <button type="submit" class="btn btn-signup btn-block mt-2">
                            Back to Sign In
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
