<?php

namespace Balance\Lam\Controller\Adminhtml;

use Magento\Framework\DataObjectFactory as ObjectFactory;

/**
 * Class Index.
 * @package Balance\Lam\Controller\Adminhtml
 */
abstract class Index extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Balance_Lam::balance';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var ObjectFactory
     */
    protected $_objectFactory;

    /**
     * @var \Magento\Framework\View\LayoutFactory
     * @deprecated 100.2.0
     */
    protected $layoutFactory;

    /**
     * @var \Magento\Framework\View\Result\LayoutFactory
     */
    protected $resultLayoutFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var \Balance\Lam\Model\ItemFactory
     */
    protected $itemFactory;

    /**
     * Index constructor.
     *
     * @param \Magento\Backend\App\Action\Context               $context
     * @param \Magento\Framework\Registry                       $coreRegistry
     * @param \Magento\Framework\View\LayoutFactory             $layoutFactory
     * @param \Magento\Framework\View\Result\LayoutFactory      $resultLayoutFactory
     * @param \Magento\Framework\View\Result\PageFactory        $resultPageFactory
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\Controller\Result\JsonFactory  $resultJsonFactory
     * @param \Balance\Lam\Model\ItemFactory                    $itemFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\LayoutFactory $layoutFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Balance\Lam\Model\ItemFactory $itemFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->layoutFactory = $layoutFactory;
        $this->resultLayoutFactory = $resultLayoutFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }
}
