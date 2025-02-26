<?php

namespace DocfavPruebaTecnica\Domain\User\ValueObject;


class Name
{
  private string $Name;

  public function __construct(string $Name)
  {
    if(strlen($Name) < 5){
      throw new \InvalidArgumentException('El nombre debe tener al menos 5 caracteres');
    }
    if(strlen($Name) > 50){
      throw new \InvalidArgumentException('El nombre no puede tener más de 50 caracteres');
    }
    if(!preg_match('/^[a-zA-Z0-9 ]+$/', $Name)){
      throw new \InvalidArgumentException('El nombre solo puede contener letras y números');
    }

    $this->Name = $Name;
  }

  public function getName(): string
  {
    return $this->Name;
  }
}