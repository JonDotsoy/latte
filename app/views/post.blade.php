@extends('layout.home')

@section('itemscope')
	@if($post->canView())
	@if($post->type == 'product')
itemscope itemtype="http://schema.org/Product"
	@else
itemscope itemtype="http://schema.org/Article"
	@endif
	@endif
@stop

@section('title')
@parent
{{{$post->genTitle()}}}
@stop

@section('metadatas')
	@if($post->canView())
	@if($post->type == 'product')
		<!-- Añade las tres etiquetas siguientes en la sección "head". -->
		<meta itemprop="name" content="{{{$post->genTitle()}}}">
		<meta itemprop="description" content="{{{$post->content}}}">
		<meta itemprop="image" content="{{{$post->getImage()}}}">
		<!-- Twitter Card -->
		<meta name="twitter:card" content="product">
		<meta name="twitter:site" content="@jonad_in">
		<meta name="twitter:creator" content="@jonad_in">
		<meta name="twitter:domain" content="{{{URL::to('/')}}}">
		<meta name="twitter:title" content="{{{$post->genTitle()}}}">
		@if(strlen($post->content)<200)
		<meta name="twitter:description" content="{{{$post->content}}}">
		@else
		<meta name="twitter:description" content="{{{substr($post->content,0,190).'...'}}}">
		@endif
		<meta name="twitter:image" content="{{{$post->getImage()}}}">
		<meta name="twitter:data1" content="{{{$post->data1}}}">
		<meta name="twitter:label1" content="{{{$post->data2}}}">
		<meta name="twitter:data2" content="{{{$post->data3}}}">
		<meta name="twitter:label2" content="{{{$post->data4}}}">
	@else
		<meta itemprop="name" content="{{{$post->genTitle()}}}">
		<meta itemprop="description" content="{{{$post->content}}}">
		<meta itemprop="image" content="{{{$post->getImage()}}}">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@jonad_in">
		<meta name="twitter:title" content="{{{$post->genTitle()}}}">
		@if(strlen($post->content)<200)
		<meta name="twitter:description" content="{{{$post->content}}}">
		@else
		<meta name="twitter:description" content="{{{substr($post->content,0,190).'...'}}}">
		@endif
		<meta name="twitter:creator" content="@jonad_in">
		<meta name="twitter:image:src" content="{{{$post->getImage()}}}">
		<meta name="twitter:domain" content="@jonad_in">
	@endif
	@endif
@stop

@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
	@if($post->canView())
	@if($post->type == 'product')
	    @include('objects.posts.product',array('post'=>$post))
	@elseif ($post->type == 'video')
	    @include('objects.posts.video',array('post'=>$post))
	@else
	    @include('objects.posts.article',array('post'=>$post))
	@endif
	@else
	<div class="alert alert-warning">Este articulo esta oculto. Por favor intentelo nuevamente mas tarde.</div>
	@endif
	</div>
</div>
@stop