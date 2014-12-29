@extends('layout.home');

@section('content')

<div class="jumbotron danger">
	<h1>Des conexión Correcto</h1>
	<h2>Nos vemos en la próxima.</h2>
	<div class="text-center"><a href="{{{URL::to('/')}}}" class="btn btn-primary btn-lg">Ir a inicio</a></div>
</div>

@stop
