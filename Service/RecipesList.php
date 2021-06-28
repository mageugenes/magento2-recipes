<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Service;

use Mageugenes\Recipes\Api\RecipesListInterface;
use Mageugenes\Recipes\Api\Data\RecipeInterface;
use Mageugenes\Recipes\Api\RecipesRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class RecipesList implements RecipesListInterface
{
    /**
     * @var RecipesRepositoryInterface
     */
    private RecipesRepositoryInterface $recipesRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * CustomerTaskList constructor.
     * @param RecipesRepositoryInterface $recipesRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        RecipesRepositoryInterface $recipesRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->recipesRepository = $recipesRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return RecipeInterface[]
     */
    public function getList(): array
    {
        return $this->recipesRepository
            ->getList($this->searchCriteriaBuilder->create())
            ->getItems();
    }
}
