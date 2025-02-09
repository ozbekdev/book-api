<?php

namespace App\Controller;

use ApiPlatform\Validator\ValidatorInterface;
use App\Entity\Book;
use App\Factory\BookFactory;
use App\Manager\BookManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookCreateAction extends AbstractController
{
    public function __construct(
        public BookFactory $bookFactory,
        public BookManager $bookManager,
        private readonly ValidatorInterface $validator
    ) {
    }

    #[NoReturn] public function __invoke(Book $book): Book
    {
        $this->validator->validate($book);

        $this->bookFactory->createBook(
            $book->getName(),
            $book->getAuthor(),
            $book->getDescription(),
            $book->getCategory()
        );

        $this->bookManager->create($book, true);

        return $book;
    }
}