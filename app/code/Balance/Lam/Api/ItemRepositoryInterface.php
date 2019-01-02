<?php

namespace Balance\Lam\Api;

/**
 * Interface ItemRepositoryInterface.
 * @package Balance\Lam\Api
 */
interface ItemRepositoryInterface
{
    /**
     * @return \Balance\Lam\Api\Data\ItemInterface[]
     */
    public function getList();
}
