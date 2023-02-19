<?php

namespace App\Models\Manage;

use Database\Class\Users;
use LionSQL\Drivers\MySQL as DB;

class UsersModel {

	public function __construct() {
		
	}

    public function readUsersDB(Users $users) {
        return DB::table('users')
            ->select()
            ->where(DB::notEqualTo("idusers"), $users->getIdusers())
            ->getAll();
    }

}