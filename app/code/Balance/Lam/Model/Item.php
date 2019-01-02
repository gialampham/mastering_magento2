<?php

namespace Balance\Lam\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Item.
 * @package Balance\Lam\Model
 */
class Item extends AbstractModel
{
    /**
     * @var
     */
    protected $item;

    /**
     * @var
     */
    protected $description;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(\Balance\Lam\Model\ResourceModel\Item::class);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getData('description');
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->setData('name', $name);

        return $this;
    }

    /**
     * @param $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->setData('description', $description);

        return $this;
    }
}
