<?php

namespace Nip\ViewBlocks\Tests\Models\Traits;

use Nip\ViewBlocks\Tests\AbstractTest;
use Nip\ViewBlocks\Tests\Fixtures\Models\HasCachebleBlocksTrait\Record;

/**
 * Class HasCachebleBlocksTraitTest
 * @package Nip\ViewBlocks\Tests\Models\HasCachebleBlocksTrait
 */
class HasCachebleBlocksTraitTest extends AbstractTest
{

    /**
     * @dataProvider getCacheBlocksPathData()
     * @param $id
     * @param $path
     */
    public function testGetCacheBlocksPath($id, $path)
    {
        $record = new Record();
        $record->id = $id;

        self::assertSame($path, $record->getCacheBlocksPath());
    }

    /**
     * @return array
     */
    public function getCacheBlocksPathData()
    {
        return [
            [6, '/tmp\cacheble-blocks\has-cacheblocks\0\6\\'],
            [999, '/tmp\cacheble-blocks\has-cacheblocks\1000\999\\'],
            [9999, '/tmp\cacheble-blocks\has-cacheblocks\10000\9999\\'],
            [9999999, '/tmp\cacheble-blocks\has-cacheblocks\10000000\9999999\\'],
        ];
    }
}
