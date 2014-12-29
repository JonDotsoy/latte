@foreach ($ads as $key => $ad)
<div class="banner">{{$ad->get_html()}}</div>
@endforeach
