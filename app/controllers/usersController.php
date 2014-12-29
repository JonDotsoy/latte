<?php

class usersController extends \BaseController {

	function listUsers() {

		$d = array();
		$d['users'] = User::all();

		return View::make('listUsers',$d);
	}

	function viewUser($id_user) {
		$d = array();

		$d['user'] = User::find($id_user);

		if (!$d['user']) {
			return App::abort(404);
		}

		return View::make('editUser',$d);
	}

	function editUser($id_user) {
		$user = User::find($id_user);

		if (Input::has('name')) {
			if (Input::get('name') != '') {
				$user->nombre = Input::get('name');
			}
		}

		if (Input::has("pass")) {
			if (Input::get('pass') != '') {
				$user->pass = Input::get('pass');
			}
		}

		if (Input::has('publicProfile')) {
			if (Input::get('publicProfile') == 'public') {
				$user->public = true;
			}
			if (Input::get('publicProfile') == 'private') {
				$user->public = false;
			}
		}

		if (Auth::check() && Auth::User()->canChangeRoll()) {
			if (Input::has("roll")) {
				if (Input::get('roll') != '') {
					$user->roll = Input::get('roll');
				}
			}
		}

		@$user->save();

		return Redirect::to($user->url_edit());
	}

}
