<?php

namespace Tests\Unit\Domain\User;

use DocfavPruebaTecnica\Domain\User\Entity\User;
use DocfavPruebaTecnica\Domain\User\ValueObject\UserId;
use DocfavPruebaTecnica\Domain\User\ValueObject\Name;
use DocfavPruebaTecnica\Domain\User\ValueObject\Email;
use DocfavPruebaTecnica\Domain\User\ValueObject\Password;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $userId = new UserId('123');
        $name = new Name('John Doe');
        $email = new Email('john@example.com');
        $password = new Password('Password123!');

        $user = new User($userId, $name, $email, $password);

        $this->assertSame($userId, $user->getId());
        $this->assertSame($name, $user->getName());
        $this->assertSame($email, $user->getEmail());
        $this->assertSame($password, $user->getPassword());
    }
}