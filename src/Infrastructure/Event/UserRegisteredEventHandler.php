<?php
namespace DocfavPruebaTecnica\Infrastructure\Event;

use DocfavPruebaTecnica\Domain\User\Event\UserRegisteredEvent;

class UserRegisteredEventHandler
{
    public function __invoke(UserRegisteredEvent $event): void
    {
        $user = $event->getUser();
        echo "Enviando correo... " . $user->getEmail()->getEmail() . "\n";
    }
}