<?php

namespace Satgeorilievi\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PagesControllerProvider
 * @package Satgeorilievi\Controllers
 */
class PagesControllerProvider implements ControllerProviderInterface
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
         *  Sitemap
         */
        $controllers->get('/sitemap.xml', function (Application $app) {

            $sql = "SELECT count(id) FROM items_satgeorilievi WHERE approved = 1";
            $count = $app['db']->fetchColumn($sql);

            /** @var \Kilte\Pagination\Pagination $pagination */
            $pagination = $app['pagination']($count, 1);
            $tot = $pagination->totalPages();

            return new Response($app['twig']->render(
                'sitemap.xml.twig',
                array(
                    'pages' => $app['config']['satgeoroutes'],
                    'tot_pages' => $tot
                )
            ),
                200,
                array('Content-Type' => 'application/xml')
            );
        })->bind('sitemap');


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
        })->value('page', 'home')->bind('pages');

        return $controllers;
    }
}