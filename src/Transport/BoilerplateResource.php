<?php

namespace HttpConnect\Boilerplate\Transport;

use HttpConnect\HttpConnect\Transport\ResourceInterface;

class BoilerplateResource implements ResourceInterface
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(
        string $firstName,
        string $lastName,
        string $email
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) json_encode([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
        ], JSON_THROW_ON_ERROR);
    }
}
