<?php

namespace App\Models\Auth;

use Database\Class\Users;
use LionSQL\Drivers\MySQL as DB;

class LoginModel {

	public function __construct() {

	}

    public function authDB(Users $users) {
        return DB::table('users')
            ->select(DB::as(DB::count('*'), "cont"))
            ->where(DB::equalTo("users_email"), $users->getUsersEmail())
            ->and(DB::equalTo("users_password"), $users->getUsersPassword())
            ->get();
    }

    public function sessionDB(Users $users): Users {
        return DB::fetchClass(Users::class)
            ->table('users')
            ->select("idusers", "users_name")
            ->where(DB::equalTo("users_email"), $users->getUsersEmail())
            ->and(DB::equalTo("users_password"), $users->getUsersPassword())
            ->get();
    }

}