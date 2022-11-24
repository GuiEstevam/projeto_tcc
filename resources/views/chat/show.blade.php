@extends('layouts.main')

@section('title', 'Chat')

@section('content')


@foreach ($messages as $message)
    <p>Mensagem: {{$message->content}}</p>
    <p>Projeto:{{$projetos->name}}</p>
    <p>Responsavel: {{$message->content}}</p>
    <p>Mensagem: {{$message->content}}</p>
    @dd($messageOwner)
@endforeach
@endsection
