@extends('layout.home');

@section('content')

<div class="jumbotron alert alert-warning">
	<h1>Inicio de Sesión incorrecto</h1>
	<p>No hemos podido reconocer los datos ingresado. Asegurare se de ingresar correctamente los datos antes de re intentarlo.</p>
	<a href="{{{URL::to('/login')}}}" class="btn btn-primary">Intentarlo Nuevamente</a>
</div>

@stop
