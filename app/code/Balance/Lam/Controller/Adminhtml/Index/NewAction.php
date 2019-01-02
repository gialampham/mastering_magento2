<?php

namespace Balance\Lam\Controller\Adminhtml\Index;

/**
 * Class NewAction.
 * @package Balance\Lam\Controller\Adminhtml\Index
 */
class NewAction extends \Balance\Lam\Controller\Adminhtml\Index
{
    /**
     * Create new customer action
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');

        return $resultForward;
    }
}
