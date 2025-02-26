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
        $userId = new UserId(123);
        $name = new Name('John Doe');
        $email = new Email('john@example.com');
        $password = new Password('Password123!');

        $user = new User($userId, $name, $email, $password);

        $this->assertSame($userId, $user->getId());
        $this->assertSame($name, $user->getName());
        $this->assertSame($email, $user->getEmail());
        $this->assertSame($password, $user->getPassword());
    }
    public function testValidUserId(): void
    {
        $id = new UserId(550);
        $this->assertEquals(550, $id->getId());
    }

    public function testValidName(): void
    {
        $name = new Name('John Doe');
        $this->assertEquals('John Doe', $name->getName());
    }
    public function testShortNameThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name('Jo');
    }
    public function testValidEmail(): void
    {
        $email = new Email('test@example.com');
        $this->assertEquals('test@example.com', $email->getEmail());
    }
    public function testInvalidEmailThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('invalid-email');
    }
    public function testValidPassword(): void
    {
        $password = new Password('SecurePass123!');
        $this->assertTrue(password_verify('SecurePass123!', $password->getHashedPassword()));
    }
}