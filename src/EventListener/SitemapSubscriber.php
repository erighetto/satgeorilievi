<?php

namespace App\EventListener;

use App\Entity\News;
use Doctrine\Common\Persistence\ManagerRegistry;
use Kilte\Pagination\Pagination;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Service\UrlContainerInterface;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;

class SitemapSubscriber implements EventSubscriberInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var ManagerRegistry
     */
    private $doctrine;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     * @param ManagerRegistry       $doctrine
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, ManagerRegistry $doctrine)
    {
        $this->urlGenerator = $urlGenerator;
        $this->doctrine = $doctrine;
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            SitemapPopulateEvent::ON_SITEMAP_POPULATE => 'populate',
        ];
    }

    /**
     * @param SitemapPopulateEvent $event
     */
    public function populate(SitemapPopulateEvent $event): void
    {
        $this->registerBlogPostsUrls($event->getUrlContainer());
    }

    /**
     * @param UrlContainerInterface $urls
     */
    public function registerBlogPostsUrls(UrlContainerInterface $urls): void
    {
        $posts = $this->doctrine->getRepository(News::class)->findAll();

        $pagination = new Pagination(count($posts), 1, 30);

        for ($i = 1; $i <= $pagination->totalPages(); $i++) {

            $urls->addUrl(
                new UrlConcrete(
                    $this->urlGenerator->generate(
                        'news_index',
                        ['page' => $i],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                ),
                'news'
            );
        }
    }
}