<?php

namespace DocfavPruebaTecnica\Domain\User\ValueObject;


class Email
{
  private string $Email;

  public function __construct(string $Email)
  {
    if ($Email === "") {
      throw new \InvalidArgumentException('El email no puede estar vacío');
    }
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      throw new \InvalidArgumentException('El email no es válido');
    }
    $this->Email = $Email;
  }

  public function getEmail(): string
  {
    return $this->Email;
  }
}