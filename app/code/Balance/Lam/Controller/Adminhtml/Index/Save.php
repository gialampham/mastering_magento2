<?php

namespace Balance\Lam\Controller\Adminhtml\Index;

/**
 * Class Save.
 * @package Balance\Lam\Controller\Adminhtml\Index
 */
class Save extends \Balance\Lam\Controller\Adminhtml\Index
{
    /**
     * @return $this|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getPostValue();
            $model = $this->itemFactory->create();
            if (isset($data['general']['id'])) {
                $model = $this->itemFactory->create()->load($data['general']['id']);
            }
            $model->setName($data['general']['name']);
            $model->setDescription($data['general']['description']);

            $model->save();
            $this->messageManager->addSuccessMessage(sprintf('You saved the "%s".', $model->getName()));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("Cannot save Update."));

            if (isset($data['general']['id']) && $data['general']['id'] !== null) {
                return $this->resultRedirectFactory->create()->setPath('*/*/edit', ['id' => $data['general']['id']]);
            }

            return $this->resultRedirectFactory->create()->setPath('*/*/edit');
        }

        return $this->resultRedirectFactory->create()->setPath('*/*/');
    }
}
