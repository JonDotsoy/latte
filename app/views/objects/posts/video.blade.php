<div class="article panel panel-default">
    <div class="panel-body">
        <!-- Titulo de le componente de panel /!-->
        @if($post->author)
        <div class="media">
            <span class="pull-left">
                <img src="{{{$post->author->image(60)}}}" alt="" class="img img-responsive img-circle">
            </span>
            <div class="media-body">
                <h4 class="media-heading">{{{$post->author->nombre}}}</h4>
                <span class="media-back-title">
                @if ($post->created_at == $post->updated_at)
                Ha creado una nueva publicación
                @else
                Ha modificado la publicación
                @endif
                <small title="{{{$post->updated_at}}}"><a href="{{{$post->url()}}}">{{{$post->format_time()}}}</a></small></span>
                @if (!$post->status)
                <div class="label label-danger">Articulo Oculto</div>
                @endif
            </div>
        </div>
        @else
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">
                @if ($post->created_at == $post->updated_at)
                Se ha creado una nueva publicación
                @else
                Se ha editado una publicación
                @endif
                <small title="{{{$post->updated_at}}}"><a href="{{{$post->url()}}}">{{{$post->format_time()}}}</a></small></h4>
                @if (!$post->status)
                <div class="label label-danger">Articulo Oculto</div>
                @endif
            </div>
        </div>
        @endif
        <!--  Fin del titulo /!-->
        <!-- Entra al cuerpo del contenido -->
        <div>
            {{$post->content_html()}}
        </div>
        <!-- Fin del cuerpo del contenido -->
    </div>
        @if ($post->isValidVideo())
        @if ($post->getTypeVideo()=='youtube')
        <div class="ratio ratio-video">
            <iframe class="ratio-item" width="100%" height="100%" src="{{{$post->getURLVideoEnable()}}}" frameborder="0" allowfullscreen></iframe>
        </div>
        @endif
        @if ($post->getTypeVideo() == 'vimeo')
        <div class="ratio ratio-video">
            <iframe class="ratio-item" src="{{{$post->getURLVideoEnable()}}}?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;color=007195" width="100%" height="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
        @endif
        @endif
    <div class="panel-control">
        <div class="dropdown btn btn-link btn-xs">
          <span data-toggle="dropdown">
            <i class="icon-fa icon-fa-share"></i>
            Compartir
          </span>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{{$post->url_twitter()}}}" target="_blank"><i class="icon-fa icon-fa-twitter"></i> twitter</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{{$post->url_facebook()}}}" target="_blank"><i class="icon-fa icon-fa-facebook"></i> Facebook</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{{$post->url_google_plus()}}}" target="_blank"><i class="icon-fa icon-fa-google-plus"></i> Google Plus</a></li>
          </ul>
        </div>
        <button data-href="{{{$post->url_liked()}}}" data-href-status="{{{$post->url_liked_status()}}}" class="btn btn-link btn-xs" data-liked="preload" data-loading-text="<i class='icon-fa icon-fa-spinner icon-fa-spin'></i> Me gusta" data-success-text="<i class='icon-fa icon-fa-kaunto'></i> Me gusta" data-count-text="% le gusta"><i class="icon-fa icon-fa-kaunto-o"></i> Me gusta</button>
        <a href="{{{$post->url().'#comments'}}}" class="btn btn-link btn-xs">
            <i class="icon-fa icon-fa-comment"></i>
            {{{$post->format_comments()->count}}} {{{($post->format_comments()->plural)?'Comentario':'Comentarios'}}}
        </a>
        <div class="options dropdown btn btn-link btn-xs pull-right">
            <a data-toggle="dropdown" href="#">
                &#x25BE;
            </a>
            <ul class="dropdown-menu" role="menu">
                @include('objects.controlPost')
            </ul>
        </div>
    </div>
    <div class="panel-coments">
        @include('objects.boxComment')
    </div>
</div>