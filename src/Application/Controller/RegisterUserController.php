<?php

namespace DocfavPruebaTecnica\Application\Controller;

use DocfavPruebaTecnica\Application\DTO\RegisterUserRequest;
use DocfavPruebaTecnica\Domain\UseCase\RegisterUserUseCase;

class RegisterUserController
{
    private RegisterUserUseCase $useCase;

    public function __construct(RegisterUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(array $data): string
    {
        $request = new RegisterUserRequest();
        $request->name = $data['name'];
        $request->email = $data['email'];
        $request->password = $data['password'];

        $this->useCase->execute($request);

        return json_encode(['status' => 'Usuario registrado correctamente']);
    }
}