<?php

namespace Mageugenes\Recipes\Service;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Mageugenes\Recipes\Api\Data\RecipeInterface;
use Mageugenes\Recipes\Api\Data\RecipesSearchResultInterface;
use Mageugenes\Recipes\Api\Data\RecipesSearchResultInterfaceFactory;
use Mageugenes\Recipes\Api\RecipesRepositoryInterface;
use Mageugenes\Recipes\Model\RecipesFactory;
use Mageugenes\Recipes\Model\ResourceModel\Recipes as RecipesResource;

class RecipesRepository implements RecipesRepositoryInterface
{
    /**
     * @var RecipesResource
     */
    private RecipesResource $resource;

    /**
     * @var RecipesFactory
     */
    private RecipesFactory $recipesFactory;

    /**
     * @var RecipesSearchResultInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * RecipesRepository constructor.
     * @param RecipesResource $resource
     * @param RecipesFactory $recipesFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param RecipesSearchResultInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        RecipesResource $resource,
        RecipesFactory $recipesFactory,
        CollectionProcessorInterface $collectionProcessor,
        RecipesSearchResultInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->recipesFactory = $recipesFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * @param int $id
     * @return RecipeInterface
     */
    public function get(int $id): RecipeInterface
    {
        $recipe = $this->recipesFactory->create();
        $this->resource->load($recipe, $id);

        return $recipe;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return RecipesSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RecipesSearchResultInterface
    {
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);

        $this->collectionProcessor->process($searchCriteria, $searchResult);

        return $searchResult;
    }
}
