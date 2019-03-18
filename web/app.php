<?php declare(strict_types=1);

namespace App;

use hollodotme\FastCGI\Client;
use hollodotme\FastCGI\Requests\PostRequest;
use hollodotme\FastCGI\SocketConnections\NetworkSocket;

require __DIR__ . '/../vendor/autoload.php';


$client = new ClientExample();
$client->run();

class ClientExample
{
	const CGI_WORKER_PATH = __DIR__ . '/../src/worker.php';

	/**
	 * @return int
	 */
	public function run(  ): int
	{
		$client = new Client(new NetworkSocket('127.0.0.1', 9000));
		$i = 0;

		while ( $i < 10 )
		{
			$request = new PostRequest(
				'/var/www/src/worker.php',
				http_build_query( [
					'iteration' => $i
				] ) );

			$client->sendAsyncRequest( $request );
			$i++;
		}

		# Loop until all responses were received
		while ( $client->hasUnhandledResponses() )
		{
			# read all ready responses
			foreach ( $client->readReadyResponses( 3000 ) as $response )
			{
				echo $response->getBody();
			}

			usleep( 2000 );
		}

		return $i;
	}
}
