<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('pass', 'remember_token');

	function image($size = 120) {
		return '//www.gravatar.com/avatar/'.md5($this->email).'.jpg?s='.$size.'&d=mm';
	}

	function url_edit() {
		return URL::to('/users/'.$this->id);
	}

	function url_gravatar() {
		return '//www.gravatar.com/'.md5($this->email);
	}

	public function isSuperAdmin() {
		return (boolean) ($this->roll == 1);
	}

	public function isAdmin() {
		return (boolean) ($this->roll == 2);
	}

	function isUser() {
		return (boolean) ($this->roll == 0);
	}

	function canListUsers() {
		$p = false;

		if ($this->isSuperAdmin()) {$p = true;}
		if ($this->isAdmin()) {$p = true;}

		return $p;
	}

	function canEditAds() {
		$p = false;

		if ($this->isSuperAdmin()) {$p = true;}

		return $p;
	}

	function canWriteNewPost() {
		$p = false;

		if ($this->isSuperAdmin()) {$p = true;}
		if ($this->isAdmin()) {$p = true;}
		//if ($this->isUser()) {$p = true;}

		return $p;
	}

	function canViewEmail() {
		$p = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->id) === @((integer)$user->id)) {
				$p = true;
			}
			if ($user->isSuperAdmin()) {
				$p = true;
			}
			if ($user->isAdmin()) {
				$p = true;
			}
		}

		return $p;
	}

	function canEditProfile() {
		$p = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->id) === @((integer)$user->id)) {
				$p = true;
			}
			if ($user->isSuperAdmin()) {
				$p = true;
			}
		}

		return $p;
	}

	function canProfilePublic() {
		$p = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->id) === @((integer)$user->id)) {
				$p = true;
			}
			if ($user->isSuperAdmin()) {
				$p = true;
			}
			if ($user->isAdmin()) {
				$p = true;
			}
		}
		if ($this->public) {
			$p = true;
		}

		return $p;
	}

	function canChangePassword() {
		$p = false;

		if (Auth::check()) {
			$user = Auth::User();
			if (@((integer)$this->id) === @((integer)$user->id)) {
				$p = true;
			}
			if ($user->isSuperAdmin()) {
				$p = true;
			}
		}

		return $p;
	}

	function canChangeRoll() {
		$p = false;

		if (Auth::check()) {
			$user = Auth::User();
			if ($user->isSuperAdmin()) {
				$p = true;
			}
		}

		return $p;
	}

}
