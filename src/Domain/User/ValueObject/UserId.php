<?php

namespace DocfavPruebaTecnica\Domain\User\ValueObject;


final class UserId
{
  private int $id;

  public function __construct(int $id)
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }
}