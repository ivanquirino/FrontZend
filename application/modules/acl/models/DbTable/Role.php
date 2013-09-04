<?php

/**
 * FrontZend CMS
 *
 * @category   Module
 * @package    Module_Model
 * @subpackage DbTable
 * @copyright  Copyright (c) 2013 (http://frontzend.jaimeneto.com)
 */

class Acl_Model_DbTable_Role extends FrontZend_Module_Model_DbTable_Abstract
{
    protected $_name         = 'acl_role';
    protected $_primary      = 'id_role';
    protected $_modelClass   = 'Acl_Model_Role';
    protected $_enablePrefix = true;

    protected $_dependentTables = array(
        'Acl_Model_DbTable_User',
    );
    
}