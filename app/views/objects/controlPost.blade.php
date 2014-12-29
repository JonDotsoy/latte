<!-- <li><a href="#">Reportar un problema</a></li> -->
<li><a data-toggle="modal" data-target="#myModalCopyFiel" data-changer="#block_url_copy_to_share" data-type="value" data-value="{{{$post->url()}}}">Ver vinculo a la publicación</a></li>
@if ($post->canEdit())
<li><a href="{{{$post->url_edit()}}}">Editar</a></li>
@endif
@if ($post->canDelete())
<li><a href="{{{$post->url_delete()}}}">Eliminar</a></li>
@endif