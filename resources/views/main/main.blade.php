@extends('layouts.layout')

@section('content')
@guest()
    <div class="big-text">Зарегистрируйте или авторизируйтесь</div>
@endguest
    @auth()
        <div class="select-action">
            <span><a href="{{route('allDialogs')}}">диалоги</a></span>
            <span><a href="{{route('newMessage')}}">написать</a></span>
        </div>
    @endauth
@endsection
