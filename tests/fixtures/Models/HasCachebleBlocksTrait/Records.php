<?php

namespace Nip\ViewBlocks\Tests\Fixtures\Models\HasCachebleBlocksTrait;

use Nip\Utility\Traits\SingletonTrait;

/**
 * Class Records
 * @package Nip\ViewBlocks\Tests\Fixtures\Models\HasCachebleBlocksTrait
 */
class Records extends \Nip\Records\RecordManager
{
    use SingletonTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritdoc
     */
    public function getController()
    {
        return 'has-cacheblocks';
    }
}
