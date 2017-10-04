<?php declare(strict_types=1);

namespace App;

use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$requestHandler = new RequestHandler();

echo $requestHandler->handleRequest($request);

/**
 * Class RequestHandler
 */
final class RequestHandler
{
	/**
	 * @param Request $request
	 *
	 * @return string
	 */
	public function handleRequest(Request $request): string
	{
		return 'Handle Task ' . $request->request->get('iteration');
	}
}
