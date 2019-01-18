<?php declare(strict_types=1);

/**
 * Twig Public Path
 * @license https://opensource.org/licenses/MIT MIT
 * @author Renan Cavalieri <renan@tecdicas.com>
 */

namespace Pollus\TwigView\Extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Pollus\TwigPublicPath\PublicPathComponent;

class PublicPathExtension extends AbstractExtension
{
    protected $component;
    
    public function __construct(PublicPathComponent $component) 
    {
        $this->component = $component;
    }
    
    /**
     * @return array
     */
    public function getFunctions() : array
    {
        return 
        [
            new TwigFunction('url', [$this->component, 'url'], ['is_safe' => ['html']]),
            new TwigFunction('public_path', [$this->component, 'absolute'], ['is_safe' => ['html']]),
            new TwigFunction('external_url', [$this->component, 'external'], ['is_safe' => ['html']]),
        ];
    }
}
