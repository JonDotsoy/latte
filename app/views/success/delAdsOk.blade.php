@extends('layout.home');

@section('content')

<div class="jumbotron danger">
	<h1>Campaña Eliminado</h1>
	<h2>Se ha eliminado correctamente la Campaña.</h2>
	<div class="text-center"><a href="{{{URL::to('/ads')}}}" class="btn btn-primary btn-lg">Ir a Campañas</a></div>
</div>

@stop
