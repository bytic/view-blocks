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
        $path = 'cacheble-blocks'
            . DIRECTORY_SEPARATOR . $dirName
            . DIRECTORY_SEPARATOR . $idGroup
            . DIRECTORY_SEPARATOR . $this->id
            . DIRECTORY_SEPARATOR;
        return cache_path($path);
    }
}
