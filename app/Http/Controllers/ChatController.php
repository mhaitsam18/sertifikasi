<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('auth.chat.index', [
            'title' => "chat"
        ]);
    }

    public function getChat(Request $request)
    {
        $user = [
            'my_id' => auth()->user()->id,
            'other_id' => $request->user_id
        ];

        $chat = Chat::where(function ($query) use ($user) {
            $query->where("pengirim_id", $user['my_id'])
                ->where("penerima_id", $user['other_id']);
        })->orWhere(function ($query) use ($user) {
            $query->where("penerima_id", $user['my_id'])
                ->where("pengirim_id", $user['other_id']);
        })->oldest()->get();

        return view('auth.chat.get-chat', [
            "data_chat" => $chat,
            "other" => User::find($user['other_id']),
            "my" => User::find($user['my_id']),
        ]);
    }

    public function getChat2($other_id)
    {
        $user = [
            'my_id' => auth()->user()->id,
            'other_id' => $other_id
        ];

        $chat = Chat::where(function ($query) use ($user) {
            $query->where("pengirim_id", $user['my_id'])
                ->where("penerima_id", $user['other_id']);
        })->orWhere(function ($query) use ($user) {
            $query->where("penerima_id", $user['my_id'])
                ->where("pengirim_id", $user['other_id']);
        })->oldest()->get();

        echo view('auth.chat.get-chat-2', [
            "data_chat" => $chat,
            "other" => User::find($user['other_id']),
            "my" => User::find($user['my_id'])
        ]);
    }

    public function kirimChat(Request $request)
    {
        $pesan = $request->pesan;
        $other_id = $request->other_id;

        Chat::create([
            'pengirim_id' => auth()->user()->id,
            'penerima_id' => $other_id,
            'pesan' => nl2br($pesan),
            'is_read' => 0,
        ]);

        $this->getChat2($other_id);
    }
}
