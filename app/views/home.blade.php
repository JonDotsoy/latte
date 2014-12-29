@extends('layout.home')

@section('scripts')
<script>
$( document ).ready(function() {
    $("[data-columns]").masonry()
    $("img").one("load", function() {
        $("[data-columns]").masonry()
    })
	$('[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		$("[data-columns]").masonry()
	})
    $('[data-show-tell]').on('showTell.close',function (e) {
        $("[data-columns]").masonry()
    })
    $('[data-show-tell]').on('showTell.focus',function (e) {
        $("[data-columns]").masonry()
    })
})
</script>
@stop

@section('content')
<div class="row">
	<div class="row" data-columns>
	    @if (Auth::check() && Auth::User()->canWriteNewPost())
	    <div class="col-xs-12 col-sm-6">
	        @include('objects.createPublic')
	    </div>
	    @endif
	    @foreach($posts as $key => $post)
	        @if ($post->canView())
	        @if($post->type == 'product')
	        <div class="col-xs-12 col-sm-6">
	                @include('objects.posts.product',array('post'=>$post))
	        </div>
	        @elseif ($post->type == 'video')
	        <div class="col-xs-12 col-sm-6">
	                @include('objects.posts.video',array('post'=>$post))
	        </div>
	        @else
            <div class="col-xs-12 col-sm-6">
                @include('objects.posts.article',array('post'=>$post))
            </div>
	        @endif
	        @endif
	    @endforeach
	</div>
</div>
@stop


