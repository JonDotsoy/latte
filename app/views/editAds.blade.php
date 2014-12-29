@extends('layout.home')

@section('content')

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		@if (isset($ad))
		<h2>Editar Campaña</h2>
		@else
		<h2>Nueva Campaña</h2>
		@endif
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label>Titulo</label>
				<input required name="title" type="text" class="form-control" value="{{{@$ad->title}}}">
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<input required name="description" type="text" class="form-control" value="{{{@$ad->description}}}">
			</div>
			<div class="form-group">
				<label>Source del anuncio</label>
				<div class="help-block">Este campo contiene el código en <abbr title="HyperText Markup Language" class="initialism"><i class="icon-fa icon-fa-html5"></i> HTML</abbr> (Se puede combinar con lenguaje <small>(md)</small> Markdown) de la publicada que sera mostrada. <em>Se recomienda trabajar con precaución.</em></div>
				<textarea name="source" rows="10" class="form-control">{{{@$ad->source}}}</textarea>
			</div>
			<div class="form-group">
				<label>Fecha de Inicio</label>
				<input name="dateStart" type="datetime-local" class="form-control" placeholder="dd/mm/aaaa hh:mm" value="{{{strftime('%Y-%m-%dT%H:%M:%S', strtotime(@$ad->open))}}}" step="1">
			</div>
			<div class="form-group">
				<label>Fecha de Termino</label>
				<input name="dateEnd" type="datetime-local" class="form-control" placeholder="dd/mm/aaaa hh:mm" value="{{{strftime('%Y-%m-%dT%H:%M:%S', strtotime(@$ad->end))}}}" step="1">
			</div>
			<div class="form-group">
				<label>Nivel de presencia</label>
				<div class="help-block">El nivel de presencia define la proclividad para mostrar un anuncio especifico.</div>
				<input name="presence" type="number" min="0" class="form-control" value="{{{@$ad->presence}}}">
			</div>
			@if (isset($ad))
			<button type="submit" class="btn btn-primary"><i class="icon-fa icon-fa-save"></i> Guardar</button>
			<a href="{{{@$ad->url_del()}}}" class="btn btn-danger">Eliminar</a>
			@else
			<button type="submit" class="btn btn-primary"><i class="icon-fa icon-fa-save"></i> Crear</button>
			@endif
		</form>
	</div>
</div>

@stop