<?php

use components\Helpers;
use components\User;
use Laminas\Diactoros\ServerRequestFactory;
use samdark\hydrator\Hydrator;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';
require 'components/UserDto.php';

$request = ServerRequestFactory::fromGlobals();

$data = json_decode($request->getBody()->getContents(), true);

if (empty($data)) {
    return Helpers::response(Helpers::HTTP_BAD_REQUEST, 'Пустой запрос');
}

$userDtoHydrator = new Hydrator([
    'id' => 'id',
    'firstName' => 'firstName',
    'lastName' => 'lastName',
    'phoneNumber' => 'phoneNumber',
    'email' => 'emailAddress',
]);

/** @var UserDto $userDto */
$userDto = $userDtoHydrator->hydrate($data, UserDto::class);

$user = new User($userDto);

if (!$user->validate()) {
    return Helpers::response(Helpers::HTTP_BAD_REQUEST, $user->getErrors());
} else {
    return Helpers::response(Helpers::HTTP_OK, $user->getErrors());
}
