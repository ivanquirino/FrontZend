<?php

/**
 * FrontZend CMS
 *
 * @category   Module
 * @package    Module_Model
 * @subpackage DbTable
 * @copyright  Copyright (c) 2013 (http://frontzend.jaimeneto.com)
 */

class Layout_Model_DbTable_Page extends FrontZend_Module_Model_DbTable_Abstract
{
    protected $_name         = 'layout_page';
    protected $_primary      = 'id_layout_page';
    protected $_modelClass   = 'Layout_Model_Page';
    protected $_enablePrefix = true;

    protected $_dependentTables = array(
        'Layout_Model_DbTable_Block',
    );

    protected $_referenceMap = array(
        'Theme' => array(
            'columns'       => 'id_layout_theme',
            'refTableClass' => 'Content_Model_DbTable_Theme',
            'refColumns'    => 'id_layout_theme'
        ),
        'Content' => array(
            'columns'       => 'id_content',
            'refTableClass' => 'Content_Model_DbTable_Content',
            'refColumns'    => 'id_content'
        ),
        'ContentType' => array(
            'columns'       => 'id_content_type',
            'refTableClass' => 'Content_Model_DbTable_ContentType',
            'refColumns'    => 'id_content_type'
        ),
    );

    /**
     * Retorna a página do layout relativa a um conteúdo
     * Se não encontrar, pode buscar pelo tipo de conteúdo
     *
     * @param mixed $content
     * @param bool $findByContentType Se não encontrar, busca pelo tipo
     */
    public function findByContent($content, $findByContentType=true)
    {
        $idContent = $content instanceof Content_Model_Content
            ? $content->getId()
            : $content;

        $page = FrontZend_Container::get('LayoutPage')->findOne(array('where' =>
            array('id_content = ?' => $idContent)));

        if ($findByContentType && !$page) {
            if (!($content instanceof Content_Model_Content)) {
                $content = FrontZend_Container::get('Content')->findById($idContent);
            }

            $page = $this->findByContentType($content->id_content_type);
        }

        return $page;
    }

    /**
     * Retorna a página do layout relativa ao tipo de conteúdo
     *
     * @param mixed $contentType
     */
    public function findByContentType($contentType)
    {
        if ($contentType instanceof Content_Model_ContentType) {
            $contentType = $contentType->getId();
        }

        return FrontZend_Container::get('LayoutPage')->findOne(array('where' =>
            array('id_content_type = ?' => $contentType)));
    }

    /**
     * Retorna uma página especial não diretamente relacionada a um conteúdo
     * ou tipo de conteúdo
     *
     * @param mixed $special
     */
    public function findSpecial($special)
    {
        return FrontZend_Container::get('LayoutPage')->findOne(array('where' =>
            array('special = ?' => $special)));
    }

}

