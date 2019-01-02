<?php

namespace Balance\Lam\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index.
 * @package Balance\Lam\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
