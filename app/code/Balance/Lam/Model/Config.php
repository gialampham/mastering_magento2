<?php

namespace Balance\Lam\Model;

/**
 * Class Config.
 * @package Balance\Lam\Model
 */
class Config extends \Magento\Eav\Model\Config
{
    const XML_PATH_ENABLE = 'balance/general/enabled';
    const XML_PATH_COMPRESSION = 'balance/general/compression';

    /**
     * Core store config
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     *
     * @param \Magento\Framework\App\CacheInterface                          $cache
     * @param \Magento\Eav\Model\Entity\TypeFactory                          $entityTypeFactory
     * @param \Magento\Eav\Model\ResourceModel\Entity\Type\CollectionFactory $entityTypeCollectionFactory
     * @param \Magento\Framework\App\Cache\StateInterface                    $cacheState
     * @param \Magento\Framework\Validator\UniversalFactory                  $universalFactory
     * @param \Magento\Framework\Serialize\SerializerInterface|null          $serializer
     * @param \Magento\Framework\App\Config\ScopeConfigInterface             $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\CacheInterface $cache,
        \Magento\Eav\Model\Entity\TypeFactory $entityTypeFactory,
        \Magento\Eav\Model\ResourceModel\Entity\Type\CollectionFactory $entityTypeCollectionFactory,
        \Magento\Framework\App\Cache\StateInterface $cacheState,
        \Magento\Framework\Validator\UniversalFactory $universalFactory,
        \Magento\Framework\Serialize\SerializerInterface $serializer = null,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($cache, $entityTypeFactory, $entityTypeCollectionFactory, $cacheState, $universalFactory,
            $serializer);
    }

    /**
     * @return mixed
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLE, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getExpression()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_COMPRESSION, \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}
