<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface RecipesSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return RecipeInterface[]
     */
    public function getItems();

    /**
     * @param RecipeInterface[] $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
