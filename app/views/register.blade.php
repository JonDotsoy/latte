@extends('layout.home')

@section('content')

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="well well-sm">
			<form action="{{{URL::to('/register')}}}" method="POST" role="form">
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Nombre Completo</label>
					<input name="name" type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input name="pass" type="password" class="form-control">
				</div>
				<button type="submti" class="btn btn-primary btn-block">Registrarse</button>
				<a href="{{{URL::to('/login')}}}" class="btn btn-default btn-block btn-sm">Iniciar Sesión</a>
			</form>
		</div>
	</div>
</div>

@stop