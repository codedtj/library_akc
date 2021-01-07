@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="container-fluid">
                <div class="row">
                    <a class="mx-auto mb-5 text-info" href="{{route('home')}}"><h4>Вернуться на главную</h4></a>
                </div>

            </div>

            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Вход
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" value="{{old('email')}}" name="email" type="email" required
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" value="{{old('password')}}" name="password"
                                       required
                                       autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="remember_me"></label>
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2">Запомнить меня</span>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        Забыли пароль?
                                    </a>
                                @endif

                                <button class="ml-4 btn btn-info">
                                    Войти
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
