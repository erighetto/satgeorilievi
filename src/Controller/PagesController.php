<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\Menu;

/**
 * Class PagesController
 * @package App\Controller
 */
class PagesController extends Controller
{
    /**
     * @var Menu
     */
    protected $navigation;

    /**
     * PagesController constructor.
     */
    public function __construct()
    {
        $this->navigation = new Menu();
    }

    /**
     * @Route("/", name="home", options={"sitemap" = true})
     */
    public function home()
    {
        return $this->render('pages/home.html.twig', [
            'title' => 'Rilievi con laser scanner, rilievo celerimetrico, rilievi topografici, rilievi gps',
            'description' => 'Rilievo con laser scanner 3D, rilievi gps, rilievo celerimetrico, rilievi topografici',
            'navigation' => $this->navigation->main(),
        ]);
    }

    /**
     * @Route("/chi-siamo", name="chi_siamo", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function chiSiamo()
    {
        return $this->render('pages/chi-siamo.html.twig', [
            'title' => 'Chi siamo',
            'description' => 'La storia dello studio specialista in rilevazioni topografiche, rilevazione con gps e rilevazione con laser scanner 3D',
            'navigation' => $this->navigation->main(),
        ]);
    }

    /**
     * @Route("/servizi", name="servizi", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function servizi()
    {
        return $this->render('pages/servizi.html.twig', [
            'title' => 'Rilievo gps, rilievo laser scanner, rilievi topografici',
            'description' => 'Rilievo gps, rilievo laser scanner, rilievo celerimetrico e rilievo topografico per piani quotati, frazionamenti e tracciamenti, accatastamenti e riconfinazioni',
            'navigation' => $this->navigation->main(),
        ]);
    }

    /**
     * @Route("/dove-siamo", name="dove_siamo", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function doveSiamo()
    {
        return $this->render('pages/dove-siamo.html.twig', [
            'title' => 'Rilievo gps, rilievo laser scanner, rilievi topografici',
            'description' => 'Rilievo gps, rilievo laser scanner, rilievo celerimetrico e rilievo topografico per piani quotati, frazionamenti e tracciamenti, accatastamenti e riconfinazioni',
            'navigation' => $this->navigation->main(),
        ]);
    }

    /**
     * @Route("/contatti", name="contatti", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function contatti()
    {
        return $this->render('pages/contatti.html.twig', [
            'title' => 'Contatti',
            'description' => 'Contatti. Indirizzo mail. Vestenanova, Verona, Veneto',
            'navigation' => $this->navigation->main(),
        ]);
    }

}
