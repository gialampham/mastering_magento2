<?php

namespace Balance\Lam\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Item.
 * @package Balance\Lam\Model\ResourceModel
 */
class Item extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('balance_lam_item', 'id');
    }
}