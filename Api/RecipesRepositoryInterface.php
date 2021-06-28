<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mageugenes\Recipes\Api\Data\RecipeInterface;
use Mageugenes\Recipes\Api\Data\RecipesSearchResultInterface;

/**
 * @api
 */
interface RecipesRepositoryInterface
{
    /**
     * @param int $id
     * @return RecipeInterface
     */
    public function get(int $id): RecipeInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return RecipesSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RecipesSearchResultInterface;
}
