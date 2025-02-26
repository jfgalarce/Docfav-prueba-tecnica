<?php

namespace DocfavPruebaTecnica\Domain\User\ValueObject;


class Password
{
  private string $hashedPassword;

  public function __construct(string $password)
  {
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getHashedPassword(): string
  {
    return $this->hashedPassword;
  }

  public function verifyPassword(string $password): bool
  {
    return password_verify($password, $this->hashedPassword);
  }
}
