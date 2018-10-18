<?php

namespace Nip\Helpers\View\CachebleBlocks;

use Nip\View;
use Nip\ViewBlocks\Models\Traits\HasCachebleBlocksTrait;

/**
 * Class AbstractBlock.
 */
class AbstractBlock
{
    protected $_name;

    /**
     * @var HasCachebleBlocksTrait
     */
    protected $_model;

    protected $view;

    protected $_viewPath;

    protected $ttl = 2592000;

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->_name = $name;

        return $this;
    }

    /**
     * @param HasCachebleBlocksTrait $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->_model = $model;

        return $this;
    }

    /**
     * @param $view
     *
     * @return $this
     */
    public function setView($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param $path
     * @return $this
     */
    public function setViewPath($path)
    {
        $this->_viewPath = $path;

        return $this;
    }

    public function render()
    {
        $file = $this->filePath();
//        echo gzuncompress(file_get_contents($file));
        readfile($file);
    }

    /**
     * @return string
     */
    public function filePath()
    {
        $fileName = str_replace('/', '+', $this->_viewPath);

        return $this->cachePath().$fileName.'.html';
    }

    /**
     * @return mixed
     */
    public function cachePath()
    {
        return $this->_model->getCacheBlocksPath();
    }

    /**
     * @param $ttl
     *
     * @return bool
     */
    public function valid($ttl)
    {
        $ttl = $ttl !== null ? $ttl : $this->ttl;
        if ($this->exists()) {
            if (!is_int($ttl)) {
                return true;
            }
            $fmtime = filemtime($this->filePath());
            if (($fmtime + $ttl) > time()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return file_exists($this->filePath());
    }

    /**
     * @return bool
     */
    public function regenerate()
    {
        $file = $this->filePath();
        $content = $this->getView()->load($this->_viewPath, [], true);

        $dir = dirname($file);
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }

        $content = $this->getView()->HTML()->compress($content);
//        $content = gzcompress($content);
        if (file_put_contents($file, $content)) {
            chmod($file, 0777);

            return true;
        } else {
            $message = 'Cannot open CachebleBlocks file for writing: ';
//            if (app()->get('staging')->getStage()->inTesting()) {
//                $message .= ' [ '.$file.' ] ';
//            }
//            die($message);
        }
    }
}
