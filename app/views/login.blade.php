@extends('layout.home')

@section('content')

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="well well-sm">
			<form action="{{{URL::to('/login')}}}" method="POST" role="form">
				<div class="form-group">
					<label>Email</label>
					<input name="email" type="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input name="pass" type="password" class="form-control">
				</div>
				<button type="submti" class="btn btn-primary btn-block">Iniciar Sesión</button>
				<a href="{{{URL::to('/register')}}}" class="btn btn-default btn-block btn-sm">Registrarse</a>
			</form>
		</div>
	</div>
</div>

@stop