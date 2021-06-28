<?php
declare(strict_types=1);

namespace Mageugenes\Recipes\Api;

use Mageugenes\Recipes\Api\Data\RecipeInterface;

/**
 * @api
 */
interface RecipesListInterface
{
    /**
     * @return RecipeInterface[]
     */
    public function getList(): array;
}
