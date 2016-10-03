<?php

namespace Satgeorilievi\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

/**
 * Class ServicesControllerProvider
 * @package Satgeorilievi\Controllers
 */
class ServicesControllerProvider implements ControllerProviderInterface
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        /**
         *  Servizi
         */
        $controllers->get('/{page}', function (Application $app, $page) {

            if ($page == "") $page = 'home';

            return $app['twig']->render(
                $app['config']['satgeoservices'][$page]['binding_path'] . '.html.twig',
                array(
                    'title' => $app['config']['satgeoservices'][$page]['title'],
                    'description' => $app['config']['satgeoservices'][$page]['description']
                )
            );
        })->value('page')->bind('services');


        return $controllers;
    }
}