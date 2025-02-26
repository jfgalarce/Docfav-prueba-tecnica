<?php

namespace DocfavPruebaTecnica\infrastructure\Persistence;

use DocfavPruebaTecnica\Domain\User\Repository\UserRepositoryInterface;
use DocfavPruebaTecnica\Domain\User\Entity\User;
use DocfavPruebaTecnica\Domain\User\ValueObject\UserId;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;

class DoctrineUserRepository implements UserRepositoryInterface
{
  private EntityManagerInterface $entityManager;
  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
  }
  public function save(User $user): void
  {
    $this->entityManager->persist($user);
    $this->entityManager->flush();
  }
  public function findById(UserId $id): ?User
  {
    return $this->entityManager->getRepository(User::class)->find($id);
  }
  public function findByEmail(string $email): ?User
  {
    return $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
  }
  public function delete(UserId $id): void
  {
    $user = $this->findById($id);
    $this->entityManager->remove($user);
    $this->entityManager->flush();
  }
  
}