@extends('layout.home')

@section('content')

<div class="well">
	<h1 class="text-center"><span class="text-success">Publicación Eliminada Correctamente</span></h1>
	<div class="text-center"><a href="{{{URL::to('/')}}}" class="btn btn-lg btn-primary">Ir Inicio</a></div>
</div>

@stop