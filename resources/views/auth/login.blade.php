@extends('plantillas.pdf')
@section('pdf')
<br><br><br><br><br>
<div class="container">
    <div class="row justify-content-md-center mb-5">
        <div class="col-7 border border-success shadow mb-2">
            <div class="row justify-content-md-center mt-3">
                <h1>Iniciar sesion</h1>
            </div>
            <hr style="color: #0056b2;" width="100%" />
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row mt-2">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-5">
                    <div class="col-md-8 offset-md-5">
                        <button type="submit" class="btn btn-success">
                            {{ __('Iniciar Sesion') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection