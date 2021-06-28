<?php

declare(strict_types=1);

namespace Mageugenes\Recipes\Model\Recipes;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mageugenes\Recipes\Api\Data\RecipesSearchResultInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mageugenes\Recipes\Model\Recipes;
use Mageugenes\Recipes\Model\ResourceModel\Recipes as RecipesResource;

class Collection extends AbstractCollection implements RecipesSearchResultInterface
{
    /**
     * @var SearchCriteriaInterface
     */
    private SearchCriteriaInterface $searchCriteria;

    protected function _construct()
    {
        $this->_init(Recipes::class, RecipesResource::class);
    }

    /**
     * Get search criteria.
     *
     * @return SearchCriteriaInterface|null
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    /**
     * Set search criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return Collection
     */
    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria = null)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    /**
     * Get total count.
     *
     * @return int
     */
    public function getTotalCount()
    {
        return $this->getSize();
    }

    /**
     * Set total count.
     *
     * @param int $totalCount
     * @return $this
     */
    public function setTotalCount($totalCount)
    {
        return $this;
    }

    /**
     * Set items list.
     *
     * @param array|null $items
     * @return $this
     * @throws \Exception
     */
    public function setItems(array $items = null)
    {
        if (!$items) {
            return $this;
        }

        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }
}
