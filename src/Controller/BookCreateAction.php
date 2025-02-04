<?php

namespace App\Controller;

use App\Entity\Book;
use App\Factory\BookFactory;
use App\Manager\BookManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookCreateAction extends AbstractController
{
    public function __construct(public BookFactory $bookFactory, public BookManager $bookManager)
    {
    }

    #[NoReturn] public function __invoke(Book $book): void
    {
        $this->bookFactory->createBook(
            $book->getName(),
            $book->getAuthor(),
            $book->getDescription(),
            $book->getCategory()
        );

        $this->bookManager->create($book, true);

        print "Book created!\n";

        exit;
    }
}