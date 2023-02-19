<?php

namespace Database\Class;

class Messages implements \JsonSerializable {

	private ?int $idmessages = null;
	private ?string $messages_text = null;
	private ?string $messages_creation_date = null;
	private ?int $messages_user_sends = null;
	private ?int $messages_user_receives = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Messages {
		$messages = new Messages();

		$messages->setIdmessages(
			isset(request->idmessages) ? (int) request->idmessages : null
		);

		$messages->setMessagesText(
			isset(request->messages_text) ? request->messages_text : null
		);

		$messages->setMessagesCreationDate(
			isset(request->messages_creation_date) ? request->messages_creation_date : null
		);

		$messages->setMessagesUserSends(
			isset(request->messages_user_sends) ? (int) request->messages_user_sends : null
		);

		$messages->setMessagesUserReceives(
			isset(request->messages_user_receives) ? (int) request->messages_user_receives : null
		);

		return $messages;
	}

	public function getIdmessages(): ?int {
		return $this->idmessages;
	}

	public function setIdmessages(?int $idmessages): Messages {
		$this->idmessages = $idmessages;
		return $this;
	}

	public function getMessagesText(): ?string {
		return $this->messages_text;
	}

	public function setMessagesText(?string $messages_text): Messages {
		$this->messages_text = $messages_text;
		return $this;
	}

	public function getMessagesCreationDate(): ?string {
		return $this->messages_creation_date;
	}

	public function setMessagesCreationDate(?string $messages_creation_date): Messages {
		$this->messages_creation_date = $messages_creation_date;
		return $this;
	}

	public function getMessagesUserSends(): ?int {
		return $this->messages_user_sends;
	}

	public function setMessagesUserSends(?int $messages_user_sends): Messages {
		$this->messages_user_sends = $messages_user_sends;
		return $this;
	}

	public function getMessagesUserReceives(): ?int {
		return $this->messages_user_receives;
	}

	public function setMessagesUserReceives(?int $messages_user_receives): Messages {
		$this->messages_user_receives = $messages_user_receives;
		return $this;
	}

}