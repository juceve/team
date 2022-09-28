@extends('layouts.auth')

@section('content')
    <div class="mb-md-5 mt-md-4 pb-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="fw-bold mb-2 text-uppercase"> <span class="text-primary">INICIO</span> <span
                    class="text-success">DE</span> <span class="text-danger">SESIÓN</span></h3>
            <p class="text-white-50 mb-5">Ingrese sus credenciales por favor!</p>

            <div class="form-outline form-white mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control form-control-lg bg-dark text-white-50 @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email" autofocus style="border-color: white" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-outline form-white mb-4">
                <label class="form-label" for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                    class="form-control form-control-lg @error('email') is-invalid @enderror bg-dark text-white-50" required
                    autocomplete="current-password" style="border-color: white" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="row mb-3">
                <div class="col-md-6 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Recordarme') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-warning btn-lg px-5">
                        {{ __('Ingresar') }}
                    </button>
                    <br>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Olvidó su contraseña?') }}
                        </a>
                    @endif
<br>
                   
                </div>
            </div>
        </form>
    </div>
@endsection
