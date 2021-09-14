<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Zend\Diactoros\Response\HtmlResponse;
use Framework\Http\ResponseSender;
use Zend\Diactoros\ServerRequestFactory;

require 'vendor/autoload.php';

//init
$request = ServerRequestFactory::fromGlobals();

//action
$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'Oleh');

//sending

$emitter = new ResponseSender();
$emitter->send($response);
