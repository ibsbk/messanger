@extends('layouts.layout')

@section('content')
    <div class="big-text">
        Новое сообщение
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
            <div>Логин пользователя</div>
            <input type="text" name="login">
        </div>
        <div class="form-item">
            @error('text')
            <div class="error">{{$message}}</div>
            @enderror
            <div>Сообщение</div>
            <input type="text" name="text">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection
