<?php

namespace App\Controller;

use App\Entity\Category;
use App\Factory\CategoryFactory;
use App\Manager\CategoryManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryCreateAction extends AbstractController
{
    public function __construct(
        private readonly CategoryManager $categoryManager,
        private readonly CategoryFactory $categoryFactory
    ) {
    }

    #[NoReturn] public function __invoke(Category $category): void
    {
        $this->categoryFactory->create($category->getCategoryName());

        $this->categoryManager->createCategory($category, true);

        print "Category created\n";

        exit;
    }
}