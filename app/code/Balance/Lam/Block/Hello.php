<?php

namespace Balance\Lam\Block;

use Magento\Framework\View\Element\Template;
use Balance\Lam\Model\ResourceModel\Item\CollectionFactory;
/**
 * Class Hello.
 * @package Balance\Lam\Block
 */
class Hello extends Template
{
    /**
     * @var \Balance\Lam\Model\ResourceModel\Item\CollectionFactory
     */
    private $collectionItem;
    /**
     * Hello constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context        $context
     * @param \Balance\Lam\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     * @param array                                                   $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionItem = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Balance\Lam\Model\Item[]
     */
    public function getItems()
    {
        return $this->collectionItem->create()->getItems();
    }
}
