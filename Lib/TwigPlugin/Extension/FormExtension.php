<?php

namespace TwigPlugin\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FormExtension extends AbstractExtension
{
    /**
     * @var \FormHelper
     */
    protected $FormHelper;

    public function __construct($view)
    {
        \App::import('Helper', 'Form');
        $this->FormHelper = new \FormHelper($view);

        $this->request = $this->FormHelper->request;
        $this->response = $this->FormHelper->response;
    }

    public function getFunctions()
    {
        return array(
            'form' => new TwigFunction( 'formTag',$this,
                array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'input' => new TwigFunction( 'input',$this,
                array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'button' => new TwigFunction( 'button',$this,
                array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'submit' => new TwigFunction( 'submit',$this,
                array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'form_end' => new TwigFunction('formEnd',$this,
                                                   array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
        );
    }

    public function formTag($model = null, array $options = array())
    {
        return $this->FormHelper->create($model, $options);
    }

    public function input($field, array $options = array())
    {
        return $this->FormHelper->input($field, $options);
    }

    public function button($title = 'Submit', array $options = array())
    {
        return $this->FormHelper->button($title, $options);
    }

    public function submit($caption = null, array $options = array())
    {
        return $this->FormHelper->submit($caption, $options);
    }

    public function formEnd($options = null)
    {
        return $this->FormHelper->end($options);
    }

    public function getName()
    {
        return 'FormHelper';
    }
}
