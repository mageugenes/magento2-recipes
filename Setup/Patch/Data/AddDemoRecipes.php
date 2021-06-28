<?php

namespace Mageugenes\Recipes\Setup\Patch\Data;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Mageugenes\Recipes\Model\RecipesFactory;
use Mageugenes\Recipes\Model\ResourceModel\Recipes as RecipesResource;

/**
 * Class AddDemoRecipes
 */
class AddDemoRecipes implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var RecipesResource
     */
    private RecipesResource $recipesResource;

    /**
     * @var RecipesFactory
     */
    private RecipesFactory $recipesFactory;

    /**
     * AddDemoRecipes constructor.
     * @param RecipesResource $recipesResource
     * @param RecipesFactory $recipesFactory
     */
    public function __construct(
        RecipesResource $recipesResource,
        RecipesFactory $recipesFactory
    ) {
        $this->recipesResource = $recipesResource;
        $this->recipesFactory = $recipesFactory;
    }

    /**
     * @return AddDemoRecipes|void
     * @throws AlreadyExistsException
     */
    public function apply()
    {
        //1 demo recipe record
        $recipeData = [
            'id' => 1,
            'title' => 'Catalan Tomato Bread 1',
            'category' => 'Cooking Style 1',
            'time_to_make' => '10 (mins)',
            'image' => 'catalan-bread-1.png',
            'link' => 'https://www.youtube.com/embed/5TMitAMr5Xg'
        ];

        $recipes = $this->recipesFactory->create();
        $recipes->setData($recipeData);

        $this->recipesResource->save($recipes);

        //2 demo recipe record
        $recipeData = [
            'id' => 2,
            'title' => 'Catalan Tomato Bread 2',
            'category' => 'Cooking Style 2',
            'time_to_make' => '20 (mins)',
            'image' => 'catalan-bread-2.png',
            'link' => 'https://www.youtube.com/embed/5TMitAMr5Xg'
        ];

        $recipes = $this->recipesFactory->create();
        $recipes->setData($recipeData);

        $this->recipesResource->save($recipes);

        //3 demo recipe record
        $recipeData = [
            'id' => 3,
            'title' => 'Catalan Tomato Bread 3',
            'category' => 'Cooking Style 3',
            'time_to_make' => '25 (mins)',
            'image' => 'catalan-bread-3.png',
            'link' => 'https://www.youtube.com/embed/5TMitAMr5Xg'
        ];

        $recipes = $this->recipesFactory->create();
        $recipes->setData($recipeData);

        $this->recipesResource->save($recipes);

        //4 demo recipe record
        $recipeData = [
            'id' => 4,
            'title' => 'Catalan Tomato Bread 4',
            'category' => 'Cooking Style 4',
            'time_to_make' => '30 (mins)',
            'image' => 'catalan-bread-4.png',
            'link' => 'https://www.youtube.com/embed/5TMitAMr5Xg'
        ];

        $recipes = $this->recipesFactory->create();
        $recipes->setData($recipeData);

        $this->recipesResource->save($recipes);
    }

    /**
     * @return array
     */
    public static function getDependencies(): array
    {
        /**
         * No dependencies for this
         */
        return [];
    }

    /**
     * @return void
     */
    public function revert()
    {
        /**
         * Rollback all changes, done by this patch
         */
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        /**
         * Aliases are useful if we change the name of the patch until then we do not need any
         */
        return [];
    }
}
