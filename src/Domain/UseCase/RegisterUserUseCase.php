<?php

namespace DocfavPruebaTecnica\Domain\UseCase;

use DocfavPruebaTecnica\Application\DTO\RegisterUserRequest;
use DocfavPruebaTecnica\Domain\User\Entity\User;
use DocfavPruebaTecnica\Domain\User\ValueObject\UserId;
use DocfavPruebaTecnica\Domain\User\ValueObject\Name;
use DocfavPruebaTecnica\Domain\User\ValueObject\Email;
use DocfavPruebaTecnica\Domain\User\ValueObject\Password;
use DocfavPruebaTecnica\Domain\User\Repository\UserRepositoryInterface;
use DocfavPruebaTecnica\Domain\User\Event\UserRegisteredEvent;


class RegisterUserUseCase
{
  private UserRepositoryInterface $userRepository;


  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;

  }

  public function execute(RegisterUserRequest $request): void
  {
    $userId = new UserId(uniqid());
    $name = new Name($request->name);
    $email = new Email($request->email);
    $password = new Password($request->password);

    $user = new User($userId,  $name, $email, $password);
    if ($this->userRepository->findByEmail($email->getEmail())) {
      throw new \Exception('El email ya está en uso');
    }
    $this->userRepository->save($user);
  }
}
