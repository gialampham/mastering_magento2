<?php

namespace Balance\Lam\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Balance\Lam\Model\Item;
use Balance\Lam\Model\ResourceModel\Item as ItemResource;

/**
 * Class Collection.
 * @package Balance\Lam\Model\ResourceModel\Item
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
