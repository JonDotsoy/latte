@extends('layout.home')

@section('content')

<header>
	<h1>Campañas Publicidad</h1>
</header>
<a href="{{{Advertise::url_new()}}}" class="btn btn-default">
<i class="icon-fa icon-fa-plus"></i>
Añadir nuevo</a>
<section>
	<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th class="hidden-xs hidden-sm">Descripción</th>
			<th class="hidden-xs hidden-sm">Fecha Creación</th>
			<th class="hidden-xs">Modificado por ultima ves</th>
			<th>Control</th>
		</tr>
	</thead>
	<tbody>
	@foreach($ads as $key=>$ad)
		<tr>
			<td>{{{$ad->id}}}</td>
			<td>{{{$ad->title}}}</td>
			<td class="hidden-xs hidden-sm">{{{$ad->description}}}</td>
			<td class="hidden-xs hidden-sm">{{{$ad->created_at}}}</td>
			<td class="hidden-xs">{{{$ad->updated_at}}}</td>
			<td>
				<a href="{{{$ad->url_edit()}}}" class="btn btn-xs btn-primary">Editar</a>
				<a href="{{{$ad->url_del()}}}" class="btn btn-default btn-xs">Eliminar</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
</section>

@stop