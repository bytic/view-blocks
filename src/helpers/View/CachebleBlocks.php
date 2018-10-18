<?php

namespace Nip\Helpers\View;

use Nip\Helpers\View\CachebleBlocks\Block;

/**
 * Class CachebleBlocks
 * @package Nip\Helpers\View
 */
class CachebleBlocks extends AbstractHelper
{
    private $_blocks = [];

    /**
     * @param $name
     * @return Block
     */
    public function add($name)
    {
        $block = $this->newBlock($name);
        $this->_blocks[$name] = $block;

        return $block;
    }

    /**
     * @param $name
     * @return Block
     */
    public function newBlock($name)
    {
        $block = new Block();
        $block->setManager($this);
        $block->setName($name);

        return $block;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->_blocks[$name];
    }
}
