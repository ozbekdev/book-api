<?php

namespace App\Controller;

use ApiPlatform\Validator\ValidatorInterface;
use App\Entity\Category;
use App\Factory\CategoryFactory;
use App\Manager\CategoryManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryCreateAction extends AbstractController
{
    public function __construct(
        private readonly CategoryManager $categoryManager,
        private readonly CategoryFactory $categoryFactory,
        private readonly ValidatorInterface $validator
    ) {
    }

    #[NoReturn] public function __invoke(Category $category): Category
    {
        $this->validator->validate($category);

        $this->categoryFactory->create($category->getCategoryName());

        $this->categoryManager->createCategory($category, true);

        return $category;
    }
}