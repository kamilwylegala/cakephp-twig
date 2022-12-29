<?php

namespace TwigPlugin\Templating;

use Symfony\Component\Templating\TemplateReference as BaseTemplateReference;

class TemplateReference extends BaseTemplateReference
{
    public function __construct($plugin = null, $controller = null, $name = null, $format = null, $engine = null)
    {
        $this->parameters = array(
            'plugin'     => $plugin,
            'controller' => $controller,
            'name'       => $name,
            'format'     => $format,
            'engine'     => $engine,
        );
    }
    
    public function getPath() : string
    {
        $controller = $this->get('controller');
        
        $path = (empty($controller) ? '' : $controller . '/') . $this->get('name') . '.' . $this->get('format') . '.' . $this->get('engine');
        
        return $path;
    }
    
    public function getLogicalName() : string
    {
        return self::__toString();   
    }
    
    public function __toString() : string
    {
        return sprintf("%s:%s:%s.%s.%s", $this->get('plugin'), $this->get('controller'), $this->get('name'), $this->get('format'), $this->get('engine'));
    }
}
