<?php

namespace Satgeorilievi\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class PagesControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        /**
         *  pagine
         */
        $controllers->get('/{page}', function (Application $app, $page) {

            if ($page == "") $page = 'home';

            return $app['twig']->render(
                $app['config']['satgeoroutes'][$page]['binding_path'] . '.html.twig',
                array(
                    'title' => $app['config']['satgeoroutes'][$page]['title'],
                    'description' => $app['config']['satgeoroutes'][$page]['description']
                )
            );
        })->value('page','home')->bind('pages');


        return $controllers;
    }
}