<?php

namespace App\Http\Controllers;

use App\Models\Dialog;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    public function newMessageView()
    {
        return view('messages.newMessage');
    }

    public function newMessagePost(Request $request)
    {
        $request->validate([
            'login' => 'required|exists:users,login',
            'text' => 'required'
        ]);
        $receiver = User::where('login', $request->login)->first();

        if (!empty(($dialog = Dialog::where('user1_id', Auth::user()->id)->where('user2_id', $receiver->id)->first())) ||
            !empty(($dialog = Dialog::where('user2_id', Auth::user()->id)->where('user1_id', $receiver->id)->first()))) {
            $message = [
                'text' => $request->text,
                'sender_id' => Auth::user()->id,
                'receiver_id' => $receiver->id,
                'dialog_id' => $dialog->id,
            ];
            Message::create($message);
            return redirect()->route('allDialogs');
        } else {
            $new_dialog = [
                'user1_id' => Auth::user()->id,
                'user2_id' => $receiver->id,
            ];
            $d = Dialog::create($new_dialog);
            $message = [
                'text' => $request->text,
                'sender_id' => Auth::user()->id,
                'receiver_id' => $receiver->id,
                'dialog_id' => $d->id,
            ];
            Message::create($message);
            return redirect()->route('allDialogs');
        }
    }

    public function allDialogsView()
    {
        $dialogs = Dialog::where('user1_id', Auth::user()->id)->orWhere('user2_id', Auth::user()->id)->get();
        $users = User::all();
        return view('messages.allDialogs', compact('dialogs', 'users'));
    }

    public function dialogView(Dialog $id)
    {
        if (($id->user1_id != Auth::user()->id) && ($id->user2_id != Auth::user()->id)) {
            return redirect()->route('/');
        } else {
            $users = User::all();
            $messages = Message::where('dialog_id', $id->id)->orderBy('created_at')->get();
            $messages = $messages->reverse();
            return view('messages.dialog', compact('messages', 'users'));
        }
    }

    public function dialogPost(Request $request, Dialog $id)
    {
        $request->validate([
            'text' => 'required',
        ]);
        if ($id->user1_id == Auth::user()->id) {
            $receiver = $id->user2_id;
        } elseif ($id->user2_id == Auth::user()->id) {
            $receiver = $id->user1_id;
        }
        $message = [
            'text' => $request->text,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $receiver,
            'dialog_id' => $id->id,
        ];
        Message::create($message);
        return back();
    }
}
