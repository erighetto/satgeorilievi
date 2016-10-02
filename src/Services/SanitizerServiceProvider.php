<?php
namespace Satgeorilievi\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;

class SanitizerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        return $app["sanitizer"] = new Sanitize();
    }

    public function boot(Application $app)
    {
        // no booting requirements
    }

}

class Sanitize {
    function word_cleanup($content,$title)
    {
        $str = strip_tags($content,'<img>');
        $str = str_replace($title, "", $str);
        return $str;
    }
}