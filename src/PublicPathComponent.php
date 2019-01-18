<?php declare(strict_types=1);

/**
 * Twig Public Path
 * @license https://opensource.org/licenses/MIT MIT
 * @author Renan Cavalieri <renan@tecdicas.com>
 */

namespace Pollus\TwigPublicPath;

class PublicPathComponent 
{
    protected $domain;
    
    /**
     * @param string $domain
     */
    public function __construct(string $domain) 
    {
        $this->domain = rtrim($domain, "/");
    }
    
    /**
     * Returns an absolute URL
     * 
     * @param string|null $url
     * @param array $query
     * @return string
     */
    public function absolute(?string $url = "", array $query = []) : string
    {
        $url = ($url == null) ? "" : $url;
        $script_current_path = dirname($_SERVER["PHP_SELF"] ?? "");
        $url = $this->domain . rtrim($script_current_path, "/") . "/" . ltrim($url, "/");
        if (empty($query) === false) $url .= "?" . http_build_query($query, '', '&');
        $url = htmlentities($url, ENT_NOQUOTES, 'utf-8');
        return $url;
    }
    
    /**
     * Returns an external URL
     * 
     * @param string|null $url
     * @param array $query
     * @return string
     */
    public function external(?string $url = "", array $query =[]) : string
    {
        $url = ($url == null) ? "" : $url;
        if (empty($query) === false) $url .= "?" . http_build_query($query, '', "&");
        $url = htmlentities($url, ENT_NOQUOTES, 'utf-8');
        return $url;
    }
    
    /**
     * Returns an absolute URL or an external
     * 
     * @param string|null $url
     * @param array $query
     * @return string
     */
    public function url(?string $url, array $query = []): string
    {
        if (!(strpos($url, "://") !== false))
        {
            return $this->absolute($url, $query);
        }
        return $this->external($url, $query);
    }
}