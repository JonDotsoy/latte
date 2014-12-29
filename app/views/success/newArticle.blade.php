@extends('layout.home')

@section('content')

<div class="well">
	<h1 class="text-center"><span class="text-success">Publicación Creado Correctamente</span></h1>
	<div class="row">
		<div class="col-sm-8 col-md-8 col-sm-offset-2">
	        @if($post->type == 'product')
                @include('objects.posts.product',array('post'=>$post))
            @elseif ($post->type == 'video')
                @include('objects.posts.video',array('post'=>$post))
	        @else
                @include('objects.posts.article',array('post'=>$post))
	        @endif
			<div class="text-center"><a href="{{{$post->url()}}}" class="btn btn-lg btn-primary">Ir Publicación</a></div>
		</div>
	</div>
</div>

@stop