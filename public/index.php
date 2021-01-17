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

if (!$user->validate()) {
    http_response_code(400);
    echo json_encode($user->getErrors());
    return false;
} else {
    http_response_code(200);
    echo json_encode($user->getErrors());
    return true;
}
