<div class="media">
    <span class="pull-left">
        <img src="{{{$user->image(60)}}}" alt="" class="img img-circle">
    </span>
    <div class="media-body">
        <h4 class="media-heading">{{{$user->nombre}}}
        @if($user->canViewEmail())
        <small>({{{$user->email}}})</small>
        @endif
        </h4>
        @if(!isset($hiddenRoll))
        <h5>
        @if($user->roll==1)
        Super Administrador
        @elseif($user->roll==2)
		Administrador
		@else
		Usuario
        @endif
        </h5>
        @endif
        @if($user->canEditProfile() && !isset($noControll))
        <a href="{{{$user->url_edit()}}}" class="btn btn-default">Modificar</a>
        @endif
    </div>
</div>