<?php
declare(strict_types=1);

namespace Mageugenes\Recipes\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Asset\Repository as AssetRepository;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Mageugenes\Recipes\Api\RecipesListInterface;
use Mageugenes\Recipes\Api\RecipesRepositoryInterface;

/**
 * Class Recipes
 */
class Recipes implements ArgumentInterface
{
    const RECIPES_RELATIVE_PATH = 'dinner-recipe-ideas';
    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    /**
     * @var AssetRepository
     */
    private AssetRepository $assetRepository;

    /**
     * @var UrlInterface
     */
    private $urlInterface;

    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * @var RecipesRepositoryInterface
     */
    private RecipesRepositoryInterface $recipesRepository;

    /**
     * @var RecipesListInterface
     */
    private RecipesListInterface $recipesList;

    /**
     * Recipes constructor.
     * @param SerializerInterface $serializer
     * @param AssetRepository $assetRepository
     * @param UrlInterface $urlInterface
     * @param RequestInterface $request
     * @param RecipesRepositoryInterface $recipesRepository
     * @param RecipesListInterface $recipesList
     */
    public function __construct(
        SerializerInterface $serializer,
        AssetRepository $assetRepository,
        UrlInterface $urlInterface,
        RequestInterface $request,
        RecipesRepositoryInterface $recipesRepository,
        RecipesListInterface $recipesList
    ) {
        $this->serializer = $serializer;
        $this->assetRepository = $assetRepository;
        $this->urlInterface = $urlInterface;
        $this->request = $request;
        $this->recipesRepository = $recipesRepository;
        $this->recipesList = $recipesList;
    }

    /**
     * @return string
     */
    public function getDataJson(): string
    {
        $recipeBaseUrl = self::RECIPES_RELATIVE_PATH . DS . 'index/index/id' . DS;

        $recipeId = $this->getRecipeId();

        if ($recipeId) {
            $recipe = $this->recipesRepository->get($recipeId);

            if (!$recipe->getId()) {
                return $this->serializer->serialize([]);
            }

            $recipeData = $recipe->getData();

            $recipeData['image'] = $this->assetRepository->getUrl('Mageugenes_Recipes::images' . DS . $recipeData['image']);
            $recipeData['url'] = $this->urlInterface->getUrl($recipeBaseUrl . $recipeData['id']);
            $recipesData = [$recipeData];
        } else {
            $recipes = $this->recipesList->getList();

            foreach ($recipes as $recipe) {
                $recipeData = $recipe->getData();
                $recipeData['image'] = $this->assetRepository->getUrl('Mageugenes_Recipes::images' . DS . $recipeData['image']);
                $recipeData['url'] = $this->urlInterface->getUrl($recipeBaseUrl . $recipeData['id']);

                $recipesData[] = $recipeData;
            }
        }

        return $this->serializer->serialize($recipesData);
    }

    /**
     * Returns Recipe ID if provided or null
     *
     * @return int|null
     */
    private function getRecipeId(): ?int
    {
        $id = $this->request->getParam('id');

        return $id ? (int)$id : null;
    }
}
