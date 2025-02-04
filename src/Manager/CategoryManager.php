<?php

namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;

readonly class CategoryManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createCategory($category, bool $isNeedFlush = false): void
    {
        $this->entityManager->persist($category);

        if ($isNeedFlush) {
            $this->entityManager->flush();
        }
    }
}