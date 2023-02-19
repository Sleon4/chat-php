<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\UsersModel;
use Database\Class\Users;
use LionSecurity\JWT;

class UsersController {

    private UsersModel $usersModel;

	public function __construct() {
        $this->usersModel = new UsersModel();
	}

    public function readUsers() {
        $jwt = JWT::decode(JWT::get());

        return $this->usersModel->readUsersDB(
            (new Users)->setIdusers($jwt->data->idusers)
        );
    }

}