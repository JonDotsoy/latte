<?php

class sessionController extends \BaseController {

	public function showLogin() {
		return View::make('login');
	}

	public function showLogout() {
		try {
			Auth::logout();
		} catch (Exception $e) {}

		return View::make('success.logoutOk');
	}

	public function showRegister() {
		return View::make('register');
	}

	public function createRegister($user_select = null) {

		if ($user_select != null) {
			$user = User::find($user_select);
		} else {
			$user = new User;
			$user->email = Input::get('email');
		}

		$user->nombre = Input::get('name');
		$user->pass = md5(Input::get('pass'));
		$user->save();

		return View::make('success.registerOk',array('user' => $user));
	}

	public function createLogin() {

		$user = User::where('email','=',Input::get("email"));

		if ($user->count() == 1) {
			$user = $user->get()[0];
			if ($user->pass == md5(Input::get('pass'))) {
				try {
					Auth::login($user);
				} catch (Exception $e) {
				}
				return View::make('success.loginOk',array('user'=>$user));
			} else {
				return View::make('errors.loginNo');
			}
		} else {
			return View::make('errors.loginNo');
		}

	}

}
