<?php

/**
 * FrontZend CMS
 *
 * @category   Module
 * @package    Module_Form
 * @subpackage Block
 * @copyright  Copyright (c) 2013 (http://frontzend.jaimeneto.com)
 */

class Layout_Form_Block_Script extends Layout_Form_Block
{
    protected function _initElements()
    {       
        // title
        $this->addElement('text', 'title', array(
            'label'      => 'Título',
            'maxlength'  => 60,
            'class'      => 'input-block-level',
            'filters'    => array(
                'StripTags',
                'StringTrim'
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 60,
                    ),
                ),
            ),
            'append' => '<a href="#" rel="tooltip" data-placement="left" '
                      . 'title="Apenas para referência">'
                      . '<i class="icon-info-sign"></i></a>'
        ));

        // script
        $this->addElement('textarea', 'script', array(
            'label' => 'Script',
            'class' => 'input-block-level',
            'rows'  => 10
        ));
    }

}
