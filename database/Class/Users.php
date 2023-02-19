<?php

namespace Database\Class;

class Users implements \JsonSerializable {

	private ?int $idusers = null;
	private ?string $users_name = null;
	private ?string $users_email = null;
	private ?string $users_password = null;

	public function __construct() {

	}

	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}

	public static function formFields(): Users {
		$users = new Users();

		$users->setIdusers(
			isset(request->idusers) ? request->idusers : null
		);

		$users->setUsersName(
			isset(request->users_name) ? request->users_name : null
		);

		$users->setUsersEmail(
			isset(request->users_email) ? request->users_email : null
		);

		$users->setUsersPassword(
			isset(request->users_password) ? request->users_password : null
		);

		return $users;
	}

	public function getIdusers(): ?int {
		return $this->idusers;
	}

	public function setIdusers(?int $idusers): Users {
		$this->idusers = $idusers;
		return $this;
	}

	public function getUsersName(): ?string {
		return $this->users_name;
	}

	public function setUsersName(?string $users_name): Users {
		$this->users_name = $users_name;
		return $this;
	}

	public function getUsersEmail(): ?string {
		return $this->users_email;
	}

	public function setUsersEmail(?string $users_email): Users {
		$this->users_email = $users_email;
		return $this;
	}

	public function getUsersPassword(): ?string {
		return $this->users_password;
	}

	public function setUsersPassword(?string $users_password): Users {
		$this->users_password = $users_password;
		return $this;
	}

}