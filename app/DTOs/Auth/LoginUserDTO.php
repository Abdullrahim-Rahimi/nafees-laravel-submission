<?php

namespace App\DTOs\Auth;

class LoginUserDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            email: $data['email'],
            password: $data['password']
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}