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
})
</script>
@stop

@section('content')

<div class="row" data-columns>
	@foreach($users as $key => $user)
	@if($user->canProfilePublic())
	<div class="col-sm-6">
		<div class="well well-sm">
	        @include('objects.profileView',array('user'=>$user))
		</div>
	</div>
	@endif
	@endforeach
</div>

@stop