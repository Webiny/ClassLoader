<?php
/**
 * Webiny Framework (http://www.webiny.com/framework)
 *
 * @link      http://www.webiny.com/wf-snv for the canonical source repository
 * @copyright Copyright (c) 2009-2013 Webiny LTD. (http://www.webiny.com)
 * @license   http://www.webiny.com/framework/license
 */

namespace Webiny\Component\ClassLoader\Loaders;

/**
 * LoaderInterface defines two methods that every loader must implement.
 *
 * @package		 Webiny\Component\ClassLoader\Loaders
 */
 
abstract class LoaderAbstract
{
    /**
     * @var bool|array A list of registered maps.
     */
    protected $_maps = false;

    /**
     * @var array Optional rules that are attached to the map.
     */
    protected $_rules;

    /**
     * Get an instance of Loader.
     *
     * @return $this
     */
    static public function getInstance()
    {
        if (static::$_instance != null) {
            return static::$_instance;
        }

        static::$_instance = new static;

        return static::$_instance;
    }

    /**
     * Register a map.
     *
     * @param string $prefix Map prefix or namespace.
     * @param array|string $library Absolute path to the library or an array with path and additional options.
     *
     * @return void
     */
    abstract public function  registerMap($prefix, $library);

    /**
     * Parses that class name and returns the absolute path to the class.
     * NOTE: no file existence checks should be performed, nor should the method require or include the class, is
     * should just return the path to the file.
     *
     * @param string $class Class name that should be loaded.
     *
     * @return string|bool Path to the class or false.
     */
    abstract public function findClass($class);
}