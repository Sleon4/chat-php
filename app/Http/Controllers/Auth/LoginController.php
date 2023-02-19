<?php

namespace App\Http\Controllers\Auth;

use App\Models\Auth\LoginModel;
use Database\Class\Users;
use LionSecurity\JWT;

class LoginController {

    private LoginModel $loginModel;

	public function __construct() {
        $this->loginModel = new LoginModel();
	}

    public function auth() {
        $users = Users::formFields();

        $cont = $this->loginModel->authDB($users);
        if ($cont->cont === 0) {
            return response->error("El email/password son incorrectos");
        }

        $session = $this->loginModel->sessionDB($users);
        return response->success("Bienvenido: {$session->getUsersName()}", [
            'jwt' => JWT::encode([
                'session' => true,
                'idusers' => $session->getIdusers(),
                'users_name' => $session->getUsersName()
            ])
        ]);
    }

}