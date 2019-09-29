<?php

namespace App\Service;

use Knp\Menu\Matcher\Matcher;
use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class Menu
 * @package App\Services
 */
class Menu
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * @return string
     */
    public function main()
    {
        $factory = new MenuFactory();
        $menu = $factory->createItem('Main menu');
        $menu->setChildrenAttribute('class', 'nav');
        $menu->addChild(
            'News',
            [
                'uri' => $this->urlGenerator->generate(
                    'news_index',
                    [],
                    UrlGeneratorInterface::ABSOLUTE_URL
                ),
                'attributes' => ['class' => 'nav-item'],
            ]
        )
            ->setLinkAttribute('class', 'nav-link');
        $menu->addChild(
            'Utenti',
            [
                'uri' => $this->urlGenerator->generate(
                    'user_index',
                    [],
                    UrlGeneratorInterface::ABSOLUTE_URL
                ),
                'attributes' => ['class' => 'nav-item'],
            ]
        )
            ->setLinkAttribute('class', 'nav-link');
        $renderer = new ListRenderer(new Matcher());

        return $renderer->render($menu);
    }
}