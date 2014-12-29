<?php 

class Post extends Eloquent
{
	protected $table = 'post';

	function content_html() 
	{
		return Markdown::render(htmlentities($this->content));
	}

	function genTitle() {
		$text = explode("\n", strip_tags($this->content_html()))[0];
		$leng = strlen($text);
		$word = explode(' ', $text);
		$nText = '';

		if ($leng > 70) {
			foreach ($word as $key => $value) {
				if (strlen($nText)<70) {
					if ($nText=='') {
						$nText = $value;
					} else {
						$nText = $nText.' '.$value;
					}
				}
			}
		} else {
			$nText = $text;
		}

		return $nText;
	}

	public function comments()
	{
		return $this->hasMany('Comment','post_id');
	}

	public function author() {
		return $this->belongsTo('User','author_id');
	}

	public function format_time() {
		$dateIn = strtotime($this->updated_at);
		$dateFrom = time();
		$out = '';
		$diff = $dateFrom - $dateIn;

		if ($diff > (365*24*60*60)) {
			$out = round(($diff/(365*24*60*60)),0)."y";
		} else if ($diff > (24*60*60)) {
			$out = round(($diff/(24*60*60)),0)."d";
		} else if ($diff > (60*60)) {
			$out = round(($diff/(60*60)),0)."h";
		} else if ($diff > (60)) {
			$out = round(($diff/(60)),0)."m";
		}else if ($diff) {
			$out = round(($diff),0)."s";
		} else {
			$out = "Ahora";
		}
		
		return $out;
	}

	public function format_comments() {
		$comments = $this->comments;
		$rtn = (object) NULL;

		$rtn->count = count($comments);
		$rtn->plural = (boolean) ($rtn->count==1);

		return $rtn;
	}

	public function url() {
		return URL::to('/article/'.dechex($this->id));
	}

	function url_liked() {
		return $this->url() . '/liked';
	}

	function url_liked_status() {
		return $this->url() . '/statusliked';
	}

	function url_delete() {
		return $this->url() . '/delete';
	}

	function url_edit() {
		return $this->url() . '/edit';
	}

	function url_send_edit() {
		return URL::to('/article') . "/" . dechex($this->id);
	}

	public function url_twitter() {
		$content = $this->genTitle();

		$content = explode("\n", $content)[0];

		if (strlen($content) > 105) {
			$content = substr($content, 0, 105) . '... |';
		}

		return 'https://twitter.com/home?status=' . urlencode($content.' '.$this->url());
	}

	public function url_facebook() {
		return 'https://www.facebook.com/sharer/sharer.php?u='.urlencode($this->url());
	}

	public function url_google_plus() {
		return 'https://plus.google.com/share?url='.urlencode($this->url());
	}

	function canDelete() {
		$permiso = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->author->id) === @((integer)$user->id)) {
				$permiso = true;
			}
			if ($user->isSuperAdmin()) {
				$permiso = true;
			}
		}

		return $permiso;
	}

	function canEdit() {
		$permiso = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->author->id) === @((integer)$user->id)) {
				$permiso = true;
			}
			if ($user->isSuperAdmin()) {
				$permiso = true;
			}
		}

		return $permiso;
	}

	function canEditDate() {

		$permiso = (boolean) $this->status;

		if (Auth::check()) {
			$user = Auth::User();
			if ($user->isSuperAdmin()) {
				$permiso = true;
			}
		}

		return $permiso;
	}

	function canEditStatus() {

		$permiso = (boolean) $this->status;

		if (Auth::check()) {
			$user = Auth::User();
			if ($user->isSuperAdmin()) {
				$permiso = true;
			}
		}

		return $permiso;
	}

	function canView() {
		$permiso = (boolean) $this->status;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->author->id) === @((integer)$user->id)) {
				$permiso = true;
			}
			if ($user->isSuperAdmin()) {
				$permiso = true;
			}
		}

		return $permiso;
	}

	function isValidVideo() {
		$r = false;

		if ($this->getTypeVideo() && $this->getURLVideoEnable() != NULL) {
			$r = true;
		}

		return $r;	
	}

	function getTypeVideo() {
		$url = parse_url($this->url_video);
		$r = false;

		if ($url['host']=='www.youtube.com' || $url['host']=='youtube.com') {
			$r = 'youtube';
		}
		if ($url['host']=='www.vimeo.com' || $url['host']=='vimeo.com') {
			$r = 'vimeo';
		}

		return $r;
	}

	function getIDVideo() {
		$url = parse_url($this->url_video);
		$r = false; 

		if ($this->getTypeVideo() == "youtube") {
			$qrs = $url['query'];
			parse_str($qrs,$qrs);
			if (isset($qrs['v'])) {
				$r = $qrs['v'];
			}
		}
		if ($this->getTypeVideo() == "vimeo") {
			$url = explode('/', $url['path']);
			$r = $url[count($url)-1];
		}

		return $r;
	}

	function getURLVideoEnable() {
		$url = parse_url($this->url_video);
		$r = false;

		if ($this->getTypeVideo() == "youtube") {
			// //www.youtube.com/embed/oLaeko6CUQA
			$equ = '//www.youtube.com/embed/';
			$idV = $this->getIDVideo();
			if (isset($idV)) {
				$equ .= $idV;
				$r = $equ;
			}
		}
		if ($this->getTypeVideo() == "vimeo") {
			//http://vimeo.com/channels/staffpicks/69649037
			//player.vimeo.com/video/69649037
			$equ = '//player.vimeo.com/video/';
			$idV = $this->getIDVideo();
			if (isset($idV)) {
				$r = $equ.$idV;
			}
		}

		return $r;
	}

	function getImage() {
		$r = $this->url_photo;
		if ($this->type == "video") {
			$url = parse_url($this->url_video);
			if ($this->getTypeVideo() == "youtube") {
				// http://img.youtube.com/vi/bQVoAWSP7k4/0.jpg
				$equ = "http://img.youtube.com/vi/";
				$endequ = "/0.jpg";
				$idV = $this->getIDVideo();
				if (isset($idV)) {
					$r = $equ.$idV.$endequ;
				}
			}
			if ($this->getTypeVideo() == "vimeo") {
				// http://ts.vimeo.com.s3.amazonaws.com/235/662/23566238_640.jpg
				$r = $this->url_photo;
			}
		}
		return $r;
	}
}

?>