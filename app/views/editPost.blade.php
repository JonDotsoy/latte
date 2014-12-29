@extends('layout.home')

@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
	@if($post->type == 'product')
		@include('objects.posts.product',array('post'=>$post))
	@elseif ($post->type == 'video')
		@include('objects.posts.video',array('post'=>$post))
	@else
		@include('objects.posts.article',array('post'=>$post))
	@endif
	</div>
</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="createPublic panel panel-default">
			<div class="panel-body">
				<div id="boxContentCreate">
					@if ($post->type == 'post')
					<div id="create-article">
						<form action="{{{$post->url_send_edit()}}}" method="post" role="form" enctype="multipart/form-data">
							<input type="hidden" name="type" value="article">
							<input type="hidden" name="post-id" value="{{{$post->id}}}">
							@if($post->canEditStatus())
							<div class="form-group">
								<select name="status" class="form-control">
									<option value="">[Nuevo estado]</option>
									<option value="on">Activo</option>
									<option value="off">Inactivo</option>
								</select>
							</div>
							@endif
							@if($post->canEditDate())
							<div class="checkbox form-group">
								<label>
									<input type="checkbox" name="ResetDate">
									Reiniciar la fechas
								</label>
								<div class="help-block">Esta opción reinicia las fechas de la publicación definiéndola como re-sien creada.</div>
							</div>
							@endif
							<div class="form-group">
								<textarea name="content" placeholder="Que deseas compartir ..." rows="7" class="form-control" data-tab="enable">{{{$post->content}}}</textarea>
							</div>
							<div class="form-group">
								<label class="btn btn-default btn-block btn-file">
									<i class="fa fa-photo"></i> Foto de portada <input name="photo" type="file">
								</label>
							</div>
							<button type="submit" class="btn btn-primary btn-success btn-sm">Guardar</button>
						@if (Auth::User()->isSuperAdmin())
						<button class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
						@endif
						</form>
					</div>
					@endif
					@if ($post->type == 'video')
					<div id="create-article">
						<form action="{{{$post->url_send_edit()}}}" method="post" role="form" enctype="multipart/form-data">
							<input type="hidden" name="type" value="video">
							<input type="hidden" name="post-id" value="{{{$post->id}}}">
							@if($post->canEditStatus())
							<div class="form-group">
								<select name="status" class="form-control">
									<option value="">[Nuevo estado]</option>
									<option value="on">Activo</option>
									<option value="off">Inactivo</option>
								</select>
							</div>
							@endif
							@if($post->canEditDate())
							<div class="checkbox form-group">
								<label>
									<input type="checkbox" name="ResetDate">
									Reiniciar la fechas
								</label>
								<div class="help-block">Esta opción reinicia las fechas de la publicación definiéndola como re-sien creada.</div>
							</div>
							@endif
							<div class="form-group">
								<textarea name="content" placeholder="Que deseas compartir ..." rows="7" class="form-control" data-tab="enable">{{{$post->content}}}</textarea>
							</div>
							<div class="form-group">
                       			<input type="url" name="urlvideo" class="form-control" placeholder="Url de Youtube o Viadeo" value="{{{$post->url_video}}}">
							</div>
							<button type="submit" class="btn btn-primary btn-success btn-sm">Guardar</button>
						@if (Auth::User()->isSuperAdmin())
						<button class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
						@endif
						</form>
					</div>
					@endif
					@if ($post->type == 'product')
					<div id="create-product">
						<form action="{{{$post->url_send_edit()}}}" method="post" role="form" enctype="multipart/form-data">
							<input type="hidden" name="type" value="product">
							<input type="hidden" name="post-id" value="{{{$post->id}}}">
							<div class="form-group">
								<select name="status" class="form-control">
									<option value="">[Nuevo estado]</option>
									<option value="on">Activo</option>
									<option value="off">Inactivo</option>
								</select>
							</div>
							<div class="checkout form-group">
								<label>
									<input type="checkbox" name="ResetDate">
									Reiniciar la fechas
								</label>
								<div class="help-block">Esta opción reinicia las fechas de la publicación definiéndola como re-sien creada.</div>
							</div>
							<div class="form-group">
								<textarea name="content" placeholder="Describe tu producto ..." rows="4" class="form-control" data-tab="enable">{{{$post->content}}}</textarea>
							</div>
							<div class="form-group">
								<label class="btn btn-default btn-block btn-file">
									<i class="fa fa-photo"></i> Foto de producto <input name="photo" type="file">
								</label>
							</div>
							<div class="form-group">
								<input type="url" name="url_shop" placeholder="URL de tienda." class="form-control" value="{{{$post->url_shop}}}">
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<input name="data1" type="text" placeholder="Label 1" class="form-control" value="{{{$post->data1}}}">
									</div>
									<div class="form-group">
										<input name="data2" type="text" placeholder="Data 1" class="form-control" value="{{{$post->data2}}}">
									</div>
									<hr>
									<div class="form-group">
										<input name="data3" type="text" placeholder="Label 2" class="form-control" value="{{{$post->data3}}}">
									</div>
									<div class="form-group">
										<input name="data4" type="text" placeholder="Data 2" class="form-control" value="{{{$post->data4}}}">
									</div>
								</div>
							</div>
							<button class="btn btn-primary btn-success btn-sm">Guardar</button>
							@if (Auth::User()->isSuperAdmin())
							<button class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
							@endif
						</form>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop