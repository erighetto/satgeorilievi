<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Services\Menu;

class DefaultController extends Controller
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $navigation = new Menu();
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'title' => 'Rilievi con laser scanner, rilievo celerimetrico, rilievi topografici, rilievi gps',
            'description' => 'Rilievo con laser scanner 3D, rilievi gps, rilievo celerimetrico, rilievi topografici',
            'navigation' => $navigation->main(),
        ]);
    }
}
