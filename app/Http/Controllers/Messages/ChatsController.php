<?php

namespace App\Http\Controllers\Messages;

use App\Models\Messages\ChatsModel;
use Carbon\Carbon;
use Database\Class\Messages;
use Database\Class\Users;
use LionSecurity\JWT;

class ChatsController {

    private ChatsModel $chatsModel;
    private object $jwt;

	public function __construct() {
        $this->chatsModel = new ChatsModel();
        $this->jwt = JWT::decode(JWT::get());
	}

    public function createMessages() {
        return $this->chatsModel->createMessageDB(
            Messages::formFields()
                ->setMessagesUserSends((int) $this->jwt->data->idusers)
                ->setMessagesCreationDate(Carbon::now()->format('Y-m-d H:i:s'))
        );
    }

    public function readMessages() {
        return $this->chatsModel->readMessagesDB(
            (new Users())->setIdusers((int) $this->jwt->data->idusers),
            (new Users())->setIdusers((int) request->messages_user_receives)
        );
    }

}