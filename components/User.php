<?php

namespace components;

use UserDto;

class User
{
    public array $errors = [];
    public UserDto $dto;

    public function __construct(UserDto $dto)
    {
        $this->dto = $dto;
    }

    public function validate(): bool
    {
        if (
            empty($this->dto->getId()) ||
            empty($this->dto->getFirstName()) ||
            empty($this->dto->getLastName()) ||
            empty($this->dto->getPhoneNumber()) ||
            empty($this->dto->getEmailAddress())
        ) {
            self::addError('Поля не могут быть пустыми');
        }

        if (
            !is_string($this->dto->getFirstName()) ||
            !is_string($this->dto->getLastName())
        ) {
            self::addError('Поля firstName и lastName должны быть строками');
        }

        if (!filter_var($this->dto->getEmailAddress(), FILTER_VALIDATE_EMAIL)) {
            self::addError('Поле email должено быть валидным');
        }
        
        if (
            strlen($this->dto->getPhoneNumber()) !== 13 ||
            strlen(intval($this->dto->getPhoneNumber())) !== 12 ||
            substr($this->dto->getPhoneNumber(), 0, 4) !== '+380'
        ) {
            self::addError('Номер телефона состоит только из цифр и знака +, начинается на 380, включет в себя 13 символов (+ и 12 цифр номера телефона)');
        }

        if (!empty(self::getErrors())) {
            return false;
        }

        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError($message): void
    {
        $this->errors[] = $message;
    }
}