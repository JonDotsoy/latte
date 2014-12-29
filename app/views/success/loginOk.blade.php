@extends('layout.home');

@section('content')

<div class="jumbotron danger">
	<h1>Login Correcto</h1>
	<h2>Bienvenido {{{$user->nombre}}}</h2>
	<div class="text-center"><a href="{{{URL::to('/')}}}" class="btn btn-primary btn-lg">Ir a inicio</a></div>
</div>

@stop
