<?php

class adsController extends \BaseController {

	function showPanelControl() {
		$d = array();
		$d['ads'] = Advertise::all();

		return View::make('adsPanel',$d);
	}

	function showEditPanelControl($ad=NULL) {
		$d = array();
		if ($ad!=NULL) {
			$d['ad'] = Advertise::find($ad);
		}

		return View::make('editAds',$d);
	}

	function delPanelControl($ad = null) {
		$d = array();
		$d['ad'] = Advertise::find($ad);

		if ($d['ad']) {
			$d['ad']->delete();
			return View::make('success.delAdsOk',$d);
		} else {
			return App::abort(500);	
		}
	}

	function saveEditPanelControl($ad=NULL) {
		$d = array();
		if ($ad!=NULL) {
			$ad = Advertise::find($ad);

			if (!$ad) {
				$ad = new Advertise;
			}

			if (Input::has('title')) {
				$ad->title = Input::get('title');
			}

			if (Input::has('description')) {
				$ad->description = Input::get('description');
			}
			
			if (Input::has('source')) {
				$ad->source = Input::get('source');
			}
			
			if (Input::has('dateStart')) {
				$ad->open = date( 'Y-m-d H:i:s', strtotime(Input::get('dateStart')) );
			}
			
			if (Input::has('dateEnd')) {
				$ad->end = date( 'Y-m-d H:i:s', strtotime(Input::get('dateEnd')) );
			}
			
			if (Input::has('presence')) {
				$ad->presence = Input::get('presence');
			}

			// var_dump($ad->open);
			// var_dump($ad->end);exit;

			if ($ad->save()) {
				return Redirect::to($ad->url_edit());
			}

			$d['ad'] = $ad;
		}

		return View::make('editAds',$d);
	}
}
