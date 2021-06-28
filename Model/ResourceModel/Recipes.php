<?php


namespace Mageugenes\Recipes\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Recipes extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mageugenes_recipes', 'id');
    }
}
