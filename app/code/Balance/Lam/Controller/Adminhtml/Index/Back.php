<?php

namespace Balance\Lam\Controller\Adminhtml\Index;


/**
 * Class Back.
 * @package Balance\Lam\Controller\Adminhtml\Index
 */
class Back extends \Balance\Lam\Controller\Adminhtml\Index
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('balance/*/index');
        return $resultRedirect;
    }
}
