<?php
namespace Satgeorilievi\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;

/**
 * Class SanitizerServiceProvider
 * @package Satgeorilievi\Services
 */
class SanitizerServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     * @return Sanitize
     */
    public function register(Container $app)
    {
        return $app["sanitizer"] = new Sanitize();
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // no booting requirements
    }

}

/**
 * Class Sanitize
 * @package Satgeorilievi\Services
 */
class Sanitize {
    /**
     * @param $content
     * @param $title
     * @return mixed|string
     */
    function word_cleanup($content, $title)
    {
        $str = strip_tags($content,'<img>');
        $str = str_replace($title, "", $str);
        return $str;
    }
}