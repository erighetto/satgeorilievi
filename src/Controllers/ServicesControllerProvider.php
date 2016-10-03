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

            if ($page == "rilievi-laser-scanner-3d") {
                $template = $page;
                $title = "Rilievi Topografici  con laser scanner 3d Leica ScanStation C10";
                $description = "Rilievi Topografici con laser scanner 3d Leica ScanStation C10 eseguiti da";
            } else {
                $template = $app['config']['satgeoservices'][$page]['binding_path'];
                $title = $app['config']['satgeoservices'][$page]['title'];
                $description = $app['config']['satgeoservices'][$page]['description'];
            }

            return $app['twig']->render(
                 $template . '.html.twig',
                array(
                    'title' => $title,
                    'description' => $description
                )
            );
        })->value('page')->bind('services');


        return $controllers;
    }
}