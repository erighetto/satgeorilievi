<?php

namespace Satgeorilievi\Controllers;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use SimplePie;

/**
 * Class FeedsControllerProvider
 * @package Satgeorilievi\Controllers
 */
class FeedsControllerProvider implements ControllerProviderInterface
{

    /**
     * @param Application $app
     * @return mixed
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/update', 'Satgeorilievi\Controllers\FeedsControllerProvider::update');
        $controllers->get('/laser-scanner-3d/{page}', 'Satgeorilievi\Controllers\FeedsControllerProvider::read')
            ->value('page', 1)
            ->bind('news')
            ->convert(
                'page',
                function ($page) {
                    return (int)$page;
                }
            );

        return $controllers;
    }

    /**
     * @param Application $app
     * @return string
     */
    public function update(Application $app)
    {
        // Start counting time for the page load
        $starttime = explode(' ', microtime());
        $starttime = $starttime[1] + $starttime[0];

        // Create a new instance of the SimplePie object
        $feed = new SimplePie();
        $feed->set_cache_location(ROOT . '/cache');
        //URL del feed da importare
        $urlfeed = "http://feeds.feedburner.com/SatGeorilievi-LaserScanner3d?format=xml";

        if (isset($urlfeed) && $urlfeed !== '') {
            // Strip slashes if magic quotes is enabled (which automatically escapes certain characters)
            if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
                $urlfeed = stripslashes($urlfeed);
            }

            $feed->set_feed_url($urlfeed);

        }

        // Initialize the whole SimplePie object.  Read the feed, process it, parse it, cache it, and
        // all that other good stuff.  The feed's information will not be available to SimplePie before
        // this is called.
        $success = $feed->init();
        if ($success):
            // We'll make sure that the right content type and character encoding gets set automatically.
            // This function will grab the proper character encoding, as well as set the content type to text/html.
            $feed->handle_content_type();

            foreach ($feed->get_items() as $item):
                $sql = "SELECT id FROM items_satgeorilievi WHERE link = ?";

                $stored = $app['db']->fetchColumn($sql, [$item->get_permalink()]);

                if (!$stored) {
                    $app['db']->insert('items_satgeorilievi',
                        array(
                            'link' => $item->get_permalink(),
                            'title' => $item->get_title(),
                            'data' => $app['sanitizer']->word_cleanup($item->get_content(), $item->get_title()),
                            'posted' => $item->get_date('j M Y, g:i a'),
                            'approved' => 1
                        )
                    );
                }
            endforeach;

        endif;

        $mtime = explode(' ', microtime());
        return 'Page processed in ' . round($mtime[0] + $mtime[1] - $starttime, 3) . ' seconds.';
    }

    /**
     * @param Application $app
     * @param $page
     * @return mixed
     */
    public function read(Application $app, $page)
    {
        $sql = "SELECT count(id) FROM items_satgeorilievi WHERE approved=1";
        $count = $app['db']->fetchColumn($sql);

        /** @var \Kilte\Pagination\Pagination $pagination */
        $pagination = $app['pagination']($count, $page);
        $pages = $pagination->build();

        $queryBuilder = $app['db']->createQueryBuilder();

        $queryBuilder
            ->select('title', 'posted', 'data', 'link')
            ->from('items_satgeorilievi')
            ->where('approved = 1')
            ->orderBy('id', 'DESC')
            ->setFirstResult($page)
            ->setMaxResults($app['pagination.per_page']);

        $news = $queryBuilder->execute()->fetchAll();

        if ($page > 1) {
            $queryBuilder = $app['db']->createQueryBuilder();
            $queryBuilder
                ->select('title')
                ->from('items_satgeorilievi')
                ->where('approved = 1')
                ->orderBy('id', 'DESC')
                ->setFirstResult($page)
                ->setMaxResults(1);

            $property = $queryBuilder->execute()->fetch();
            $title = $property['title'];
            $desc = substr(strip_tags($property['data']), 0, 100);
        } else {
            $title = "Notizie legate al laser scanner 3d Leica ScanStation C10";
            $desc = "SAT Georilievi seleziona le migliori notizie su Laser Scanning 3D";
        }

        return $app['twig']->render(
            'news.html.twig',
            array(
                'title' => $title,
                'description' => $desc,
                'pages' => $pages,
                'current' => $pagination->currentPage(),
                'news' => $news
            )
        );
    }
}