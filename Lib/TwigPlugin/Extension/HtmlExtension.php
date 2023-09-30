<?php

namespace TwigPlugin\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HtmlExtension extends AbstractExtension
{
    /**
     * @var \HtmlHelper
     */
    protected $htmlHelper;

    public function __construct($view)
    {
        \App::import('Helper', 'Html');
        $this->htmlHelper = new \HtmlHelper($view);
        $this->request = $this->htmlHelper->request;
        $this->response = $this->htmlHelper->response;
    }

    public function getFunctions()
    {
        return array(
            'link' => new TwigFunction('link',$this,
                                               array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'link_unless_current' => new TwigFunction('linkUnlessCurrent',$this,
                                                              array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'url' => new TwigFunction('url',$this,
                                              array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'css' => new TwigFunction('css',$this,
                                              array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
            'script' => new TwigFunction('script',$this,
                                                 array(
                    'pre_escape'    => 'html',
                    'is_safe'       => array('html'),
                )
            ),
        );
    }

    /**
     * Provides link_to function which wraps HtmlHelper::link().
     *
     * @param $title
     * @param $url
     * @param array $options
     * @param bool $confirmMessage
     * @return string Html link.
     */
    public function link($title, $url, $options = array(), $confirmMessage = false)
    {
        return $this->htmlHelper->link($title, $url, $options, $confirmMessage);
    }

    public function linkUnlessCurrent($title, $url, $options = array(), $confirmMessage = false)
    {
        $current = false;
        $expecting = $this->url($url);

        if ($this->request->here === $expecting) {
            return $title;
        }

        return $this->link($title, $expecting, $options, $confirmMessage);
    }

    public function url($path, $full = false)
    {
        return $this->htmlHelper->url($path, $full);
    }


    public function script($url, $options = array())
    {
        return $this->htmlHelper->script($url, $options);
    }

    public function css($path, $rel = null, $options = array())
    {
        return $this->htmlHelper->css($path, $rel, $options);
    }

    public function getName()
    {
        return 'HtmlHelper';
    }
}
