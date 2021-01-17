<?php

/**
 * Class UserDto
 */
final class UserDto
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string
     */
    private string $lastName;
    /**
     * @var string
     */
    private string $phoneNumber;
    /**
     * @var string
     */
    private string $emailAddress;

    /**
     * UserDto constructor.
     * @param object $data
     */
    public function __construct(object $data)
    {
        $this->id = $data->id;
        $this->firstName = $data->firstName;
        $this->lastName = $data->lastName;
        $this->phoneNumber = $data->phoneNumber;
        $this->emailAddress = $data->email;
    }

    /**
     * Return int value from  property id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Return string value from  property firstName
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Return string value from  property lastName
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Return string value from  property phoneNumber
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Return string value from  property emailAddress
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
}