@extends('layouts.layout')

@section('content')
    <div>
        <form method="post">
            @csrf
            <div class="">
                Сообщение
            </div>
            <div>
                <input type="text" name="text">
                <button>Отправить</button>
            </div>
        </form>
    </div>
    @foreach($messages as $message)
        <div
            class="@if($message->sender_id != Auth::user()->id) message @endif @if($message->sender_id == Auth::user()->id) my-message
        @endif">
            <div>Отправил: @foreach($users as $user)
                    @if($user->id == $message->sender_id)
                        {{$user->login}}
                    @endif
                @endforeach</div>
            <div>Текст: {{$message->text}}</div>
        </div>
    @endforeach
@endsection
@section('script')
    <script src="../resources/js/js.js"></script>
@endsection
