<?php

class homeController extends \BaseController {

	function showPost() {
		$d = array();

		$d['posts'] = Post::orderBy('created_at','desc')->get();
		$d['ads'] = Advertise::getAds();

		return View::make('home',$d);
	}

}
