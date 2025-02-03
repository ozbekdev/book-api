<?php

namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;

readonly class UserManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createUser($user, bool $flush = false): void
    {
        $this->entityManager->persist($user);

        if ($flush) {
            $this->entityManager->flush();
        }
    }
}