<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Projeto;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = auth()->user();

        $projeto = Projeto::findOrFail($id);

        $messages = $projeto->message;

        $messageOwner = $messages;

        return view(
            'chat.show',
            [
                'user' => $user,
                'projeto' => $projeto,
                'messages' => $messages,
                'messageOwner' => $messageOwner
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message;
        $user = auth()->user();

        $message->content = $request->content;
        $message->user_id = $user->id;
        $message->projeto_id = $request->projeto_id;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $requestFile = $request->file;
            $extension = $requestFile->extension();
            $imageName = $requestFile->getClientOriginalName() . strtotime("now") . "." . $extension;
            $requestFile->move(storage_path('project/files'), $imageName);
            $message->file = $imageName;
        }

        $message->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
