<?php 

class Comment extends Eloquent
{
	protected $table = 'comment';

	public function post()
	{
		return $this->belongsTo('Post','post_id');
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

	function url_delete() {
		return URL::to('/article/comment/dlt/'.$this->id);
	}

	function canDelete() {
		$r = false;

		if (Session::has('lastComment')) {
			if (Session::get('lastComment') == $this->id) {
				$r = true;
			}
		}

		if (Auth::check()) {
			$user = Auth::User();
			if ($user->isSuperAdmin()) {
				$r = true;
			}
			if ($user->isAdmin()) {
				$r = true;
			}
		}

		return $r;
	}
}

?>