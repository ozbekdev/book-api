<?php

namespace App\Controller;

use App\Entity\User;
use App\Factory\UserFactory;
use App\Manager\UserManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserCreateAction extends AbstractController
{
    public function __construct(
        private readonly UserFactory $userFactory,
        private readonly UserManager $userManager,
    ) {
    }

    /**
     * @throws \DateMalformedStringException
     */
    #[NoReturn] public function __invoke(User $user): User
    {
        $user = $this->userFactory->create(
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAge(),
            $user->getGender(),
            $user->getPhone()
        );

        $this->userManager->createUser($user, true);

        print_r($user);
        exit;
    }
}