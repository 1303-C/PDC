@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header h1 text-center nav-item">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <b>
                            MANDO
                        </b>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <h5>
                                    Iniciar sesión
                                </h5>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end"><b>Correo Electronico</b>
                                </label>
                                <div class="col-md-6">
                                    <abbr title="Introduzca su correo corporativo">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </abbr>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"><b>Contraseña</b></label>

                                <div class="col-md-6">
                                    <abbr title="Intoduzca la contraseña con la que ingresa a su equipo">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </abbr>
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Iniciar Sesión
                                    </button>
                                    {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
