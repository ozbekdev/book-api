<?php

namespace App\Controller;

use App\Entity\User;
use App\Factory\UserFactory;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserCreateAction extends AbstractController
{
    #[NoReturn] public function __invoke(User $user): User
    {
        $userFactory = new UserFactory();

        $user = $userFactory->create(
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAge(),
            $user->getGender(),
            $user->getPhone()
        );

        return $user;
    }
}