@extends('layout.home');

@section('content')

<div class="jumbotron danger">
	<h1>Registro Completo</h1>
	<h2>Te damos la bienvenido {{{$user->nombre}}}</h2>
	<div class="text-center">
		<a href="{{{URL::to('/login')}}}" class="btn btn-primary btn-lg">Iniciar Sesión</a>
		<a href="{{{URL::to('/')}}}" class="btn btn-default btn-lg">Ir a inicio</a>
	</div>
</div>

@stop
