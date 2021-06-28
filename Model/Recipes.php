<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Model;

use Magento\Framework\Model\AbstractModel;
use Mageugenes\Recipes\Api\Data\RecipeInterface;
use Mageugenes\Recipes\Model\ResourceModel\Recipes as RecipesResource;

class Recipes extends AbstractModel implements RecipeInterface
{
    const RECIPES_ID = 'id';
    const RECIPES_TITLE = 'title';
    const RECIPES_CATEGORY = 'category';
    const RECIPES_TIME_TO_MAKE = 'time_to_make';
    const RECIPES_IMAGE = 'image';
    const RECIPES_LINK = 'link';
    const RECIPES_URL = 'url';

    protected function _construct()
    {
        $this->_init(RecipesResource::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->getData(self::RECIPES_ID);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getData(self::RECIPES_TITLE);
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->getData(self::RECIPES_CATEGORY);
    }

    /**
     * @return string
     */
    public function getTimeToMake(): string
    {
        return $this->getData(self::RECIPES_TIME_TO_MAKE);
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->getData(self::RECIPES_IMAGE);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->getData(self::RECIPES_LINK);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->getData(self::RECIPES_URL);
    }
}
