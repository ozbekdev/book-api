<?php

namespace App\Manager;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

readonly class BookManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create($book, bool $isNeedFlush = false): void
    {
        $this->entityManager->persist($book);

        if ($isNeedFlush) {
            $this->entityManager->flush();
        }
    }
}