<?php

namespace DocfavPruebaTecnica\Domain\User\ValueObject;


class Password
{
  private string $hashedPassword;

  public function __construct(string $password)
  {
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/', $password)) {
      throw new \InvalidArgumentException('El Password debe ser de al menos 8 caracteres, con una letra mayuscula, un numero, y un caracter especial.');
    }

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
