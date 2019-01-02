<?php

namespace Balance\Lam\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class DataProvider.
 * @package Balance\Lam\Ui
 */
class DataProvider extends AbstractDataProvider
{
    protected $collection;

    /**
     * DataProvider constructor.
     *
     * @param       $name
     * @param       $primaryFieldName
     * @param       $requestFieldName
     * @param       $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
        }
        return $result;
    }
}
