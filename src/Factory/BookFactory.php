<?php

namespace App\Factory;

use App\Entity\Book;
use App\Entity\Category;

class BookFactory
{
    public function createBook(string $name, string $author, string $description, Category $category): Book
    {
        $book = new Book();

        $book->setName($name);
        $book->setAuthor($author);
        $book->setDescription($description);
        $book->setCategory($category);

        return $book;
    }
}