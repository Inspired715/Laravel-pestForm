<?php

namespace App;

class Helpers {

	public static function getUserNameFromEmail($email) {
		$username = explode('@', $email);
		return ucfirst($username[0]);
	}
}
