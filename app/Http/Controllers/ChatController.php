<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\Message;

class ChatController extends Controller
{

public function index(){
    return view ('chat.messages');
}

public function sendMessage(Request $request){
    event(
        new Message(
            $request->input('username'),
            $request->input('message')
        )
    );
    return ["sucess" => true];
}
}
