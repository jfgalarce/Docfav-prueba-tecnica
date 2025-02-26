<?php
namespace DocfavPruebaTecnica\Domain\User\Repository;
use DocfavPruebaTecnica\Domain\User\Entity\User;
use DocfavPruebaTecnica\Domain\User\ValueObject\UserId;

interface UserRepositoryInterface
{
  public function save(User $user): void;
  public function findById(UserId $id): ?User;
  public function findByEmail(string $email): ?User;
  public function delete(UserId $id): void;
}
