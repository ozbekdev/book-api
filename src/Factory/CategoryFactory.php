<?php

namespace App\Factory;

use App\Entity\Category;

class CategoryFactory
{
    public function create(string $categoryName): Category
    {
        $category = new Category();

        $category->setCategoryName($categoryName);

        return $category;
    }
}