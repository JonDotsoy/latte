<div class="createPublic panel panel-default">
    <div class="panel-body">
        <div class="btn-group btn-group-justified">
            <a href="#create-article" class="btn btn-default btn-sm" role="tab" data-toggle="tab"><i class="icon-fa icon-fa-file"></i> Articulo</a>
            <a href="#create-product" class="btn btn-default btn-sm" role="tab" data-toggle="tab"><i class="icon-fa icon-fa-shopping-cart"></i> Producto</a>
            <a href="#create-video" class="btn btn-default btn-sm" role="tab" data-toggle="tab"><i class="icon-fa icon-fa-youtube-play"></i> Video</a>
        </div>
        <div id="boxContentCreate" class="tab-content">
            <div id="create-article" class="tab-pane">
                <form action="{{{URL::to('article')}}}" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="article">
                    <div class="form-group">
                        <textarea name="content" placeholder="Que deseas compartir ..." rows="7" class="form-control" data-tab="enable"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-default btn-block btn-file">
                            <i class="fa fa-photo"></i> Foto de portada <input name="photo" type="file">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-success btn-sm">Guardar</button>
                @if (Auth::User()->isSuperAdmin())
                <button type="submit" name="status" value="on" class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
                @endif
                </form>
            </div>
            <div id="create-video" class="tab-pane">
                <form action="{{{URL::to('article')}}}" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="video">
                    <div class="form-group">
                        <textarea name="content" placeholder="Que deseas compartir ..." rows="7" class="form-control" data-tab="enable"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="url" name="urlvideo" class="form-control" placeholder="Url de Youtube o Viadeo">
                    </div>
                    <button type="submit" class="btn btn-primary btn-success btn-sm">Guardar</button>
                @if (Auth::User()->isSuperAdmin())
                <button type="submit" name="status" value="on" class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
                @endif
                </form>
            </div>
            <div id="create-product" class="tab-pane">
                <form action="{{{URL::to('article')}}}" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="product">
                    <div class="form-group">
                        <textarea name="content" placeholder="Describe tu producto ..." rows="4" class="form-control" data-tab="enable"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="btn btn-default btn-block btn-file">
                            <i class="fa fa-photo"></i> Foto de producto <input name="photo" type="file">
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="url" name="url_shop" placeholder="URL de tienda." class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="data1" type="text" placeholder="Label 1" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="data2" type="text" placeholder="Data 1" class="form-control">
                            </div>
                            <hr>
                            <div class="form-group">
                                <input name="data3" type="text" placeholder="Label 2" class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="data4" type="text" placeholder="Data 2" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-success btn-sm">Guardar</button>
                    @if (Auth::User()->isSuperAdmin())
                    <button type="submit" name="status" value="on" class="btn btn-primary btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Guarda y publica de forma inmediata las publicaciones al blog">Guardar y publicar</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>