<?php
/**
 * Kathmandu AssignOrder.
 *
 * @category  Mage
 *
 * @author    Lam Pham <lam.pham@balanceinternet.com.au>
 * @copyright 2018 Kathmandu Ltd (http://www.kathmandu.co.nz)
 */

namespace Balance\Lam\Cron;

use Balance\Lam\Model\ItemFactory;

/**
 * Class AddItem.
 * @package Balance\Lam\Cron
 */
class AddItem
{
    /**
     * @var \Balance\Lam\Model\ItemFactory
     */
    private $itemFactory;

    /**
     * @var \Balance\Lam\Model\Config
     */
    private $config;

    /**
     * AddItem constructor.
     *
     * @param \Balance\Lam\Model\ItemFactory $itemFactory
     * @param \Balance\Lam\Model\Config      $config
     */
    public function __construct(
        ItemFactory $itemFactory,
        \Balance\Lam\Model\Config $config
    ) {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    /**
     * Add new item by cronjob with each minute
     * @throws \Exception
     */
    public function execute()
    {
        if ($this->config->isEnabled()) {
            $model = $this->itemFactory->create();
            $model->setName('Schedule Item New')
                ->setDescription('Created at :'. time())
                ->save();
        }
    }
}
