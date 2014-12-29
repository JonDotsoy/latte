<div class="product panel panel-default">
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
        <div>
            {{$post->content_html()}}
        </div>
        <div>
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{{$post->url_photo}}}" alt="" class="img img-responsive">
                </div>
                <div class="col-sm-6">
                    @if(!!$post->data1)
                    <h4>{{{$post->data1}}}</h4>
                    @endif
                    @if(!!$post->data2)
                    <h5>{{{$post->data2}}}</h5>
                    @endif
                    <hr>
                    @if(!!$post->data3)
                    <h4>{{{$post->data3}}}</h4>
                    @endif
                    @if(!!$post->data4)
                    <h5>{{{$post->data4}}}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="panel-control">
        @if ($post->url_shop)
        <a href="{{{$post->url_shop}}}" target="_blank" class="btn btn-primary btn-xs"><i class="icon-fa icon-fa-shopping-cart"></i> Comprar</a>
        @endif
        <div class="dropdown btn btn-link btn-xs">
          <span data-toggle="dropdown">
            <i class="icon-fa icon-fa-share"></i>
            Compartir
          </span>
          <ul class="dropdown-menu" role="menu">
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