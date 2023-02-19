<?php

namespace App\Models\Messages;

use Database\Class\Messages;
use Database\Class\Users;
use LionSQL\Drivers\MySQL as DB;

class ChatsModel {

	public function __construct() {
		
	}

    public function createMessageDB(Messages $messages) {
        return DB::table('messages')->insert([
            'messages_text' => $messages->getMessagesText(),
            'messages_creation_date' => $messages->getMessagesCreationDate(),
            'messages_user_sends' => $messages->getMessagesUserSends(),
            'messages_user_receives' => $messages->getMessagesUserReceives()
        ])->execute();
    }

    public function readMessagesDB(Users $messages_user_sends, Users $messages_user_receives) {
        return DB::table('messages')
            ->select()
            ->where(DB::equalTo('messages_user_sends'), $messages_user_sends->getIdusers())
            ->and(DB::equalTo('messages_user_receives'), $messages_user_receives->getIdusers())
            ->or(DB::equalTo('messages_user_sends'), $messages_user_receives->getIdusers())
            ->and(DB::equalTo('messages_user_receives'), $messages_user_sends->getIdusers())
            ->getAll();
    }

}