<?php

use App\Controllers\BaseController;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\Chat;

class Server extends BaseController{
public function index(){
	// require dirname(__DIR__) . '/vendor/autoload.php';
if(!is_cli())
die('Not this time mate');
$server = IoServer::factory(
	new HttpServer(
		new WsServer(
			new Chat(),
		)
	),
	8080
);

$server->run();

}

}