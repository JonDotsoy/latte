<!DOCTYPE html>
<html lang="{{{App::getLocale()}}}" @yield('itemscope')>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		@yield('metadatas')
		<link rel="shortcut icon" type="image/png" href="{{{URL::to('/img/favicon128.png')}}}">
		<link rel="stylesheet" href="{{{URL::to('/css/style.css')}}}">
		@yield('links')
		<script src="{{{URL::to('/js/script.js')}}}"></script>
		@yield('scripts')
		<title>@yield('title','Latte')</title>
	</head>
	<body>
		<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-sm">
	          <div class="modal-content">
	            <div class="modal-header">
	              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	              <h4 class="modal-title">Modal title</h4>
	            </div>
	            <div class="modal-body">
	              <p>One fine body…</p>
	            </div>
	            <div class="modal-footer">
	              <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
	              <button type="button" class="btn btn-sm btn-primary">Save changes</button>
	            </div>
	          </div>
	        </div>
		</div>
		<div class="modal" id="myModalCopyFiel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Ver vinculo a esta publicación</h4>
					<p>Para compartir esta publicación copia y pega este vinculo.</p>
					<input id="block_url_copy_to_share" data-select-alltext type="text" class="form-control">
	            </div>
	          </div>
	        </div>
		</div>
		<div id="navar" class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{{URL::to('/')}}}"><strong>Latte</strong> Blog</a>
				</div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{{URL::to('/listUsers')}}}">Usuarios</a></li>
                        @if(Auth::check())
                        @if(Auth::User()->canEditAds())
                        <li><a href="{{{URL::to('/ads')}}}">Publicidad</a></li>
                        @endif
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    	@if(Auth::check())
                    	<li><a href="{{{Auth::User()->url_edit()}}}">{{{Auth::User()->nombre}}}</a></li>
                    	<li><a href="{{{URL::to('/logout')}}}">Desconectarme</a></li>
                    	@else
                        <li><a href="{{{URL::to('/login')}}}">Acceder</a></li>
                        <li><a href="{{{URL::to('/register')}}}">Registrarse</a></li>
                        @endif
                    </ul>
                </div>
			</div>
		</div>
		<div class="container">
			<br>
			<br>
			<br>
			@yield('content')
		</div>
		<footer id="footer">
	      <div class="container">
	        <p class="pull-left muted credit">&copy; 2014 Latte.</p>
	        <div class="pull-right">
				<ul class="list-inline">
					<li><a href="{{{URL::to('/')}}}">Inicio</a></li>
					<li><a href="http://jonad.in/">@jonad_in</a></li>
					<li><a href="#"><i class="icon-fa icon-fa-rss"></i> Suscribirte</a></li>
				</ul>
	        </div>
	      </div>
		</footer>
	</body>
</html>