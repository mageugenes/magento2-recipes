<?php
declare(strict_types=1);

namespace Mageugenes\Recipes\Observer;

use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;

class Topmenu implements ObserverInterface
{
    /**
     * @var NodeFactory
     */
    private $nodeFactory;

    /**
     * Topmenu Observer constructor.
     * @param NodeFactory $nodeFactory
     */
    public function __construct(
        NodeFactory $nodeFactory,
        UrlInterface $urlBuilder
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->urlBuilder = $urlBuilder;
    }
    /**
     * @param EventObserver $observer
     * @return $this
     */
    public function execute(EventObserver $observer): Topmenu
    {
        $menu = $observer->getMenu();
        $tree = $menu->getTree();
        $url= $this->urlBuilder->getUrl('dinner-recipe-ideas');
        $data = [
            'name'      => __('Dinner Recipe Ideas'),
            'id'        => 'dinner-recipe-ideas',
            'url'       => $url,
            'is_active' => $url == $this->urlBuilder->getCurrentUrl()
        ];

        $node = $this->nodeFactory->create([
            'data' => $data,
            'idField' => 'root',
            'tree' => $tree,
            'menu' => $menu
        ]);

        $menu->addChild($node);

        return $this;
    }
}
