<?php
namespace App\Service;
use Knp\Menu\Matcher\Matcher;
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
        $menu->setChildrenAttribute('class','nav');
        $menu->addChild('Home', ['uri' => '/', 'attributes' => ['class' => 'nav-item']])
            ->setLinkAttribute('class', 'nav-link');
        $renderer = new ListRenderer(new Matcher());
        return $renderer->render($menu);
    }
}