<?php
namespace MyApp;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Relay\MiddlewareInterface;

class HomepageMiddleware implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param Response $response
     * @param callable|null $next
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $username = $request->getAttribute('Psr7Middlewares\Middleware')["USERNAME"];
        $msg = 'Hello, ' . $username . '.  You are currently reading content from HompageMiddleware';
        $response->getBody()->write($msg);
        // $response->getBody()->write(PHP_EOL); 
        // $response->getBody()->write(strrev($msg));
        // in this case, do anything that you want, including rendering full html pages

        return $next($request, $response);
    }

}