<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($username)
    {
        // Check username exists
        $user = User::whereUsername($username)->first();
        return view('message', compact('user'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $sent = Message::create([
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);

        if ($sent) {
            return redirect()->back()->with('success', 'Message sent');
        } else {
            return redirect()->back()->with('error', 'Error sending message');
        }
    }
}
