@extends('template')

@section('content')
<div class="container">
    <h2 class="text-center mt-5 mb-4">Login</h2>
    <div class="row justify-content-center">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3 justify-content-center">
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 justify-content-center">
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0 justify-content-center">
                    <div class="col-md-6 text-center mb-4">
                        <button type="submit" class="btn btn-primary btn-block" style="border-radius: 20px;">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                               
            </form>
        </div>
    </div>
</div>
@endsection
