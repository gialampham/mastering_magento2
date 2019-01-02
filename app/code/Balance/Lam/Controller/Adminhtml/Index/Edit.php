<?php

namespace Balance\Lam\Controller\Adminhtml\Index;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Edit.
 * @package Balance\Lam\Controller\Adminhtml\Index
 */
class Edit extends \Balance\Lam\Controller\Adminhtml\Index
{
    /**
     * Customer edit action
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function execute()
    {
        $itemId = (int)$this->getRequest()->getParam('id');;

        $isExistingCustomer = (bool)$itemId;
        if ($isExistingCustomer) {
            try {
                $item = $this->itemFactory->create()->load($itemId);
                $this->_coreRegistry->register('item_data', $item);
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addException($e, __('Something went wrong while editing the item.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('balance/*/index');
                return $resultRedirect;
            }
        }

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Balance_Lam::balance');
        $resultPage->setActiveMenu('Balance_Lam::balance');
        if ($isExistingCustomer) {
            $resultPage->getConfig()->getTitle()->prepend('Edit Item');
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New Item'));
        }

        return $resultPage;
    }
}
