@extends('layouts.layout')

@section('content')
    @foreach($dialogs as $dialog)
        <div class="dialog">
            @foreach($users as $user)
                @if($dialog->user1_id != Auth::user()->id)
                    @if($dialog->user1_id == $user->id)
                        <a href="{{'/dialog/'.$dialog->id}}">
                            <span>Диалог с: {{$user->login}}</span>
                        </a>
                    @endif
                @endif
                    @if($dialog->user2_id != Auth::user()->id)
                        @if($dialog->user2_id == $user->id)
                            <a href="{{'/dialog/'.$dialog->id}}">
                                <span>Диалог с:{{$user->login}}</span>
                            </a>
                        @endif
                    @endif
                    @if($dialog->user2_id == Auth::user()->id && $dialog->user1_id == Auth::user()->id)
                        @if($dialog->user2_id == $user->id)
                            <a href="{{'/dialog/'.$dialog->id}}">
                                <span>Диалог с:{{$user->login}}</span>
                            </a>
                        @endif
                    @endif
            @endforeach
        </div>
    @endforeach
@endsection



