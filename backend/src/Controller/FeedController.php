<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use SimplePie;

/**
 * Class FeedController
 * @package App\Controller
 */
class FeedController extends AbstractController
{

    /**
     * @Route("/feed/update", name="feed_update")
     */
    public function updateAction()
    {

        // Start counting time for the page load
        $starttime = explode(' ', microtime());
        $starttime = $starttime[1] + $starttime[0];

        // Create a new instance of the SimplePie object
        $feed = new SimplePie();
        $feed->set_cache_location($this->getCachePath());
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

                $repository = $this->getDoctrine()->getRepository(News::class);
                $stored = $repository->findOneBy(['link' => $item->get_permalink()]);

                if (!$stored && $item->get_title() !== "This RSS feed URL is deprecated") {

                    $entityManager = $this->getDoctrine()->getManager();

                    $db_record = new News();
                    $db_record->setLink($item->get_permalink());
                    $db_record->setTitle($item->get_title());
                    $db_record->setData($this->wordCleanup($item->get_content(), $item->get_title()));
                    $db_record->setApproved(1);
                    $db_record->setPosted($item->get_date());

                    $entityManager->persist($db_record);
                    $entityManager->flush();

                }

            endforeach;

        endif;

        $mtime = explode(' ', microtime());

        return $this->render(
            'feed/update.html.twig',
            [
                'message' => 'Page processed in '.round($mtime[0] + $mtime[1] - $starttime, 3).' seconds.',
                'title' => 'Import notizie',
                'description' => 'Prelevo le notizie dal feed delle notizie di Google',
            ]
        );
    }

    /**
     * @param $content
     * @param $title
     * @return mixed|string
     */
    private function wordCleanup($content, $title)
    {
        $str = strip_tags($content, '<img>');
        $str = str_replace($title, "", $str);

        return $str;
    }

    /**
     * @return string
     */
    private function getCachePath()
    {
        $fileSystem = new Filesystem();

        $path = $this->getParameter('kernel.cache_dir')."/feed";

        if (!$fileSystem->exists($path)) {
            try {
                $fileSystem->mkdir($path);
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while creating your directory at ".$exception->getPath();
            }
        }

        return $path;
    }
}
