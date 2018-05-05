<?php

namespace App\Service;

use Knp\Menu\MenuFactory;
use Knp\Menu\Renderer\ListRenderer;

/**
 * Class Menu
 * @package App\Services
 */
class Menu
{
    /**
     * @return string
     */
    public function main()
    {
        $factory = new MenuFactory();
        $menu = $factory->createItem('Main menu');
        $menu->setChildrenAttribute('class','navbar-nav');

        $menu->addChild('Home', ['uri' => '/', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');

        $menu->addChild('Chi siamo', ['uri' => 'chi-siamo', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');

        $menu->addChild('Servizi', ['uri' => 'servizi', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');

        $menu->addChild('Dove siamo', ['uri' => 'dove-siamo', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');

        $menu->addChild('Contatti', ['uri' => 'contatti', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');

        $renderer = new ListRenderer(new \Knp\Menu\Matcher\Matcher());

        return $renderer->render($menu);
    }
}