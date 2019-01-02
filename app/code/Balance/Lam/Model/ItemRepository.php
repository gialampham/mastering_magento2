<?php

namespace Balance\Lam\Model;

use Balance\Lam\Api\ItemRepositoryInterface;

/**
 * Class ItemRepository.
 * @package Balance\Lam\Model
 */
class ItemRepository implements ItemRepositoryInterface
{
    /**
     * @var \Balance\Lam\Model\ResourceModel\Item\CollectionFactory
     */
    private $itemCollection;
    /**
     * ItemRepository constructor.
     *
     * @param \Balance\Lam\Model\ResourceModel\Item\CollectionFactory $itemFactory
     */
    public function __construct(
        \Balance\Lam\Model\ResourceModel\Item\CollectionFactory $itemFactory
    ) {
        $this->itemCollection = $itemFactory;
    }

    /**
     * Get list item
     * @return \Balance\Lam\Api\Data\ItemInterface[]
     */
    public function getList()
    {
        return $this->itemCollection->create()->getItems();
    }
}
