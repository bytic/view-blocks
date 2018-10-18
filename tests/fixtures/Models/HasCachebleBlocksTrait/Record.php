<?php

namespace Nip\ViewBlocks\Tests\Fixtures\Models\HasCachebleBlocksTrait;

use Nip\ViewBlocks\Models\Traits\HasCachebleBlocksTrait;

/**
 * Class Record
 * @package Nip\ViewBlocks\Tests\Fixtures\Models\HasCachebleBlocksTrait
 */
class Record extends \Nip\Records\Record
{
    use HasCachebleBlocksTrait;

}
