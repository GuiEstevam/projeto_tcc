@extends('layouts.main')

@section('title', 'Chat')

@section('content')

  <link rel="stylesheet" href="/css/chat.css">

  <div class="container-chat">
    <div class="container">
      <div class="chat">
        <div class="chat-header">
          <div class="profile">
            <div class="left">
              <ion-icon href="/dashboard" name="arrow-back"></ion-icon>
              <img src="/img/projects/{{ $projeto->image }}" class="pp" alt="{{ $projeto->name }}">
              <h2>{{ $projeto->name }}</h2>
            </div>
            <div class="right">
            </div>
          </div>
        </div>
        <div class="chat-box">
          @foreach ($messages as $message)
            @if ($message->user_id == $user->id)
              <div class="chat-r">
                <div class="sp"></div>
                <div class="mess mess-r">
                  <p>{{ $message->content }}</p>
                  @if ($message->file)
                    <p><a href="/download/{{ $message->file }}">
                        <ion-icon name="document-attach"></ion-icon>{{ $message->file }}
                      </a></p>
                  @else
                  @endif
                  <div class="check">
                    <span>{{ $message->user->name }}</span>
                    <span>{{ date('d/m/Y', strtotime($message->created_at)) }}</span>
                  </div>
                </div>
              </div>
            @else
              <div class="chat-l">
                <div class="mess">
                  <p>{{ $message->content }}</p>
                  @if ($message->file)
                    <p><a href="/download/{{ $message->file }}">
                        <ion-icon name="document-attach"></ion-icon>{{ $message->file }}
                      </a></p>
                  @else
                  @endif
                  <div class="check">
                    <span>{{ $message->user->name }}</span>
                    <span>{{ date('d/m/Y', strtotime($message->created_at)) }}</span>
                  </div>
                </div>
                <div class="sp"></div>
              </div>
            @endif
          @endforeach
        </div>

        <div class="chat-footer text-center">
          <form action="/message" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="projeto_id" name="projeto_id" value="{{ $projeto->id }}">
            <label for="file">
              <ion-icon name="attach-outline"></ion-icon>
            </label>
            <input type="file" name="file" id="file">
            <input type="textarea" class="textarea" id="content" name="content" placeholder="Escreva aqui sua mensagem">
            <input type="submit" class="btn btn-primary" value="Enviar">
          </form>
        </div>
      </div>
    </div>
  @endsection
