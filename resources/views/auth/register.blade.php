@extends('layouts.guest')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <form method="POST" class="col-md-8 mx-auto" action="{{ route('register') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Регистрация
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required autofocus
                                   autocomplete="name">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required
                                   autocomplete="email">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password"
                                   required
                                   autocomplete="new-password">
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Подтвердите пароль</label>
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                                   type="password"
                                   required autocomplete="new-password">
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <button class="btn btn-info mx-auto" type="submit">Сохранить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>

@endsection
