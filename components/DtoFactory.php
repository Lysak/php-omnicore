<?php

namespace components;

use Laminas\Diactoros\ServerRequest;

require './components/UserDto.php';

class DtoFactory
{
    private ServerRequest $request;

    /**
     * UserFactory constructor.
     * @param ServerRequest $request
     */
    public function __construct(ServerRequest $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $dto_name
     * @return mixed
     */
    public function create(string $dto_name)
    {
        $data = json_decode($this->request->getBody()->getContents());

        return new $dto_name($data);
    }
}