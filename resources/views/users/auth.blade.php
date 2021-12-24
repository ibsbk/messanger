@extends('layouts.layout')

@section('content')
    <div class="big-text">
        Авторизация
    </div>
    @error('authError')
    <div class="error">{{$message}}</div>
    @enderror
    <form method="post">
        <div class="form-item">
            @csrf
            @error('login')
            <div class="error">{{$message}}</div>
            @enderror
            <div>Логин</div>
            <input type="text" name="login">
        </div>
        <div class="form-item">
            @error('password')
            <div class="error">{{$message}}</div>
            @enderror
            <div>Пароль</div>
            <input type="password" name="password">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection
