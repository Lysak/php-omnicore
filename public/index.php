<?php

use components\DtoFactory;
use components\User;
use Laminas\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$dtoFactory = new DtoFactory($request);

$userDto = $dtoFactory->create(UserDto::class);

$user = new User($userDto);

header('Content-Type: application/json');
echo json_encode($user->getErrors());

if (!$user->validate()) {
    http_response_code(400);
    return false;
} else {
    http_response_code(200);
    return true;
}
