<?php

namespace App\Http\Sockets;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use \SplObjectStorage;

class ChatsSocket implements MessageComponentInterface {

	protected SplObjectStorage $clients;

	public function __construct() {
		$this->clients = new SplObjectStorage();
	}

	public function onOpen(ConnectionInterface $conn) {
		$this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
	}

	public function onMessage(ConnectionInterface $from, $msg) {
		foreach ($this->clients as $client) {
			if ($from !== $client) {
				$client->send($msg);
			}
		}
	}

	public function onClose(ConnectionInterface $conn) {
		$this->clients->detach($conn);
	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		$conn->close();
	}

}