@extends('layouts.main')

@section('title', 'Projetos')

@section('content')
@foreach($situacao as $situacao)
    <table class=table  >
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Situação</th>
            </tr>        
        </thead>
        <tbody>
            <td>{{$situacao->name}}</td>
            <td>{{$situacao->situacao}}</td>
        <tbody>
        </table>
@endforeach

@endsection