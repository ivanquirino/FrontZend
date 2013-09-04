<?php

/**
 * FrontZend CMS
 *
 * @category   Module
 * @package    Module_Bootstrap
 * @copyright  Copyright (c) 2013 (http://frontzend.jaimeneto.com)
 */

class Acl_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initContainer()
    {
        $modelContainer = new Acl_Model_Container();
        $modelContainer->init();
    }
    
}

