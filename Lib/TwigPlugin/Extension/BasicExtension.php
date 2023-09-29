<?php

namespace TwigPlugin\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * CakePHP Basic functions
 *
 * Use: {{ user|debug }}
 * Use: {{ user|pr }}
 * Use: {{ 'FOO'|low }}
 * Use: {{ 'foo'|up }}
 * Use: {{ 'HTTP_HOST'|env }}
 *
 * @author Hiroshi Hoaki <rewish.org@gmail.com>
 */
class BasicExtension extends AbstractExtension
{
    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {
        return array(
            'debug' => new TwigFilter('debug'),
            'pr'    => new TwigFilter('pr'),
            'low'   => new TwigFilter('low'),
            'up'    => new TwigFilter('up'),
            'env'   => new TwigFilter('env'),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'basic';
    }
}
