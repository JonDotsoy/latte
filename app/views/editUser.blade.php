@extends('layout.home')

@section('content')

<div class="row">
	@if($user->canEditProfile())
	<div class="col-sm-8 col-sm-offset-2">
		<h4>Perfil</h4>
		<div class="well well-sm">
		@include('objects.profileView',array('user'=>$user,'noControll'=>true))
		</div>
		<h4>Foto de perfil</h4>
		<div class="row">
			<div class="col-sm-4">
				<img src="{{{$user->image(400)}}}" alt="" class="img-circle img-responsive">
			</div>
			<div class="col-sm-8">
				<dl>
					<dt>URL</dt>
					<dd>
					<a href="{{{$user->image(400)}}}" class="text-suspencive" target="_blank">http:{{{$user->image(400)}}}</a>
					proveído gracias a <a href="http://www.gravatar.com/" target="_blank">Gravatar</a>.</dd>
					<dd><a href="{{{$user->url_gravatar()}}}" class="btn btn-primary btn-xs" target="_blank">Ver perfil Gravatar</a></dd>
				</dl>
			</div>
		</div>
		@if($user->canChangePassword())
		<form action="{{{$user->url_edit()}}}" method="POST">
			<h4>Cambiar Nombre</h4>
			<div class="form-group">
				<input type="text" name="name" class="form-control" value="{{{$user->nombre}}}">
			</div>
			<h4>Cambiar Contraseña</h4>
			<div class="form-group">
				<input type="password" name="pass" class="form-control">
			</div>
			<h4>Visualización de perfil</h4>
			<div class="form-group">
				<select name="publicProfile" class="form-control">
					<option value="">[Definir]</option>
					<option value="public">Publico</option>
					<option value="private">Privado</option>
				</select>
			</div>
			@if (Auth::check() && Auth::User()->canChangeRoll())
			<h4>Definir roll del usuario</h4>
			<div class="form-group">
				<select name="roll" class="form-control">
					<option value="">[Seleccionar Roll]</option>
					<option value="0">Usuario</option>
					<option value="1">Super administrador</option>
					<option value="2">Administrador</option>
				</select>
			</div>
			@endif
			<button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
		</form>
		@endif
	</div>
	@else
	<div class="alert alert-warning">
		Lo céntimos Este perfil no es publico. Por lo que no puede acceder a el. 
	</div>
	@endif
</div>

@stop