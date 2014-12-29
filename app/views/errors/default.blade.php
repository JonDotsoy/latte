<?php 
	$title = "Error ".$code;
?>
@extends('layout.home')

@section('content')
	<div class="jumbotron">
		<div class="row">
			<div class="hidden-xs hidden-sm col-md-4">
				<img src="{{{URL::to('/img/logo308.png')}}}" alt="" class="img-responsive">
			</div>
			<div class="col-md-8">
				<h1 class="text-header">Error {{{$code}}}</h1>
				<span class="h2"><small class="text-suspencive">{{{Request::url()}}}</small></span>
				<p>No existe la dirección solicitada, Corrija la ruta e inténtelo nuevamente mas tarde.</p>
			</div>
		</div>
	</div>
@stop