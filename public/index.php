<?php
require_once __DIR__ . '/../vendor/autoload.php';

//create your own middleware stack by adding own classes to middlewares array
//relay is used to execute each of the middlewares in first-in-first-out order.

$middlewares = [];
$middlewares[] = new \Psr7Middlewares\Middleware\BasicAuthentication(["admin" => "password"]);
$middlewares[] = new \MyApp\CacheMiddleware();
$middlewares[] = new \MyApp\HomepageMiddleware();
$middlewares[] = new \MyApp\StringReverserMiddleware();
$relay = (new \Relay\RelayBuilder())->newInstance($middlewares);

// Returns new ServerRequest instance, using values from superglobals:
$request = \Zend\Diactoros\ServerRequestFactory::fromGlobals();

// iterate the request and response for each middleware in the relay
// Zend\Diactoros\Response provides an implementation of Psr\Http\Message\ResponseInterface, 
// an object to be used to aggregate response information for both HTTP clients and server-side applications, 
// including headers and message body content. It includes the following:

// class Response
// {
//     public function __construct(
//         $body = 'php://memory',
//         $statusCode = 200,
//         array $headers = []
//     );

//     // See psr/http-message's ResponseInterface for other methods
// }

$response = $relay($request, new \Zend\Diactoros\Response());



// emitting the response, is the responsibility of an emitter. An emitter accepts a response instance, and then does something 
// with it, usually sending the response back to a browser. 
// Diactoros defines an EmitterInterface as a single emitter implementation, Zend\Diactoros\Response\SapiEmitter, 
// which sends headers and output using PHP's standard SAPI mechanisms (the header() method and the output buffer).
$sapiEmitter = new \Zend\Diactoros\Response\SapiEmitter();
$sapiEmitter->emit($response);