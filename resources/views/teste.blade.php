@extends('layouts.main')

@section('title', 'Projetos')

@section('content')

    {{-- @dd($situacaos) --}}
    {{-- @dd($situacaos) --}}
    @foreach ($situacaos as $situacao) 
        @dd($situacao)
    @endforeach 
@endsection