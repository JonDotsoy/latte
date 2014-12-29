@if(isset($showComment))
<ul id="comments" class="media-list">
    @foreach($post->comments as $key => $comment)
    <li class="media">
        @if($comment->web_author)
            <a href="{{{$comment->web_author}}}" target="_blank" class="pull-left">
                <img src="http://www.gravatar.com/avatar/{{{md5($comment->email_author)}}}.jpg?s=45" alt="" class="img img-circle">
            </a>
        @else
            <img src="http://www.gravatar.com/avatar/{{{md5($comment->email_author)}}}.jpg?s=45&d=mm" alt="" class="img img-circle pull-left">
        @endif
        <div class="media-body">
            @if ($comment->canDelete())
            <div class="pull-right"><a href="{{{$comment->url_delete()}}}" title="Eliminar">&times;</a></div>
            @endif
            <h5 class="media-heading">{{{$comment->name_author}}} <small title="{{{$comment->updated_at}}}">{{{$comment->format_time()}}}</small></h5>
            <p>{{{$comment->content}}}</p>
        </div>
    </li>
    @endforeach
</ul>
@endif
<form action="{{{$post->url().'/comment'}}}" method="POST" role="form" data-show-tell=".hidden" data-show-tell-rmclass="hidden">
	@if(Auth::check())
	<input type="hidden" name="name" value="{{{Auth::User()->nombre}}}">
	<input type="hidden" name="email" value="{{{Auth::User()->email}}}">
	<div class="form-group hidden">
	@include('objects.profileView',array('user'=>Auth::User(),'noControll'=>true,'hiddenRoll'=>true))
	</div>
	@else
    <div class="form-group hidden">
    	@if (Session::has('name'))
        <input name="name" type="text" class="form-control" placeholder="Nombre" value="{{{Session::get('name')}}}">
        @else
        <input name="name" type="text" class="form-control" placeholder="Nombre">
        @endif
    </div>
    <div class="form-group hidden">
   		@if (Session::has('email'))
        <input name="email" type="text" class="form-control" placeholder="Correo electronico" value="{{{Session::get('email')}}}">
        @else
        <input name="email" type="text" class="form-control" placeholder="Correo electronico">
        @endif
    </div>
    <div class="form-group hidden">
    	@if (Session::has('website'))
        <input name="website" type="text" class="form-control" placeholder="Sitio web" value="{{{Session::get('website')}}}">
        @else
        <input name="website" type="text" class="form-control" placeholder="Sitio web">
        @endif
    </div>
    @endif
    <textarea name="comment" rows="1" class="form-control" placeholder="Agregar un comentario ..." data-show-tell-arun></textarea>
    <br class="hidden">
    <button type="submit" class="btn btn-primary btn-sm hidden">Comentar</button>
    <button type="reset" class="btn btn-default btn-sm hidden" data-show-tell-reverse>Cancelar</button>
</form>