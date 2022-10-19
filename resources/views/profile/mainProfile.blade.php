@extends('layouts.main')

@section('title', 'Perfil')

@section('content')
<div class="col-md-10 offset-md-1">
        <div class="row">
                <div id="image-container" class="col-md-4">
                    <img src="/img/banner.jpg" alt="#" class="rounded-full h-100 w-100 object-cover">
                </div>
                <div id="info-container" class="col-md-16">
                    <p> Nome </p>
                    <p> Formacao </p>
                    <p> Disponivel? </p>
                </div>
        </div>
        <div class="row">
            <div class= "col-md-12">
                Nome
            </div>
        </div>
</div>

@endsection