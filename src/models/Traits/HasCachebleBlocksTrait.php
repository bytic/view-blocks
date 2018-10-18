<?php

namespace Nip\ViewBlocks\Models\Traits;

/**
 * Trait HasCachebleBlocksTrait
 * @package Nip\ViewBlocks\Models\Traits
 */
trait HasCachebleBlocksTrait
{
    /**
     * @return string
     */
    public function getCacheBlocksPath()
    {
        $dirName = $this->getManager()->getController();
        $idGroup = round($this->id, -3);
        return CACHE_PATH . 'cacheble-blocks' . DS . $dirName . DS . $idGroup . DS . $this->id . DS;
    }
}
