<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PagesController
 * @package App\Controller
 */
class PagesController extends Controller
{

    /**
     * @Route("/", name="home", options={"sitemap" = true})
     */
    public function homeAction()
    {
        return $this->render('pages/home.html.twig', [
            'title' => 'Rilievi con laser scanner, rilievo celerimetrico, rilievi topografici, rilievi gps',
            'description' => 'Rilievo con laser scanner 3D, rilievi gps, rilievo celerimetrico, rilievi topografici'
        ]);
    }

    /**
     * @Route("/chi-siamo", name="chi_siamo", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function chiSiamoAction()
    {
        return $this->render('pages/chi-siamo.html.twig', [
            'title' => 'Chi siamo',
            'description' => 'La storia dello studio specialista in rilevazioni topografiche, rilevazione con gps e rilevazione con laser scanner 3D'
        ]);
    }

    /**
     * @Route("/servizi", name="servizi", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function serviziAction()
    {
        return $this->render('pages/servizi.html.twig', [
            'title' => 'Rilievo gps, rilievo laser scanner, rilievi topografici',
            'description' => 'Rilievo gps, rilievo laser scanner, rilievo celerimetrico e rilievo topografico per piani quotati, frazionamenti e tracciamenti, accatastamenti e riconfinazioni'
        ]);
    }

    /**
     * @Route("/dove-siamo", name="dove_siamo", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function doveSiamoAction()
    {
        return $this->render('pages/dove-siamo.html.twig', [
            'title' => 'Rilievo gps, rilievo laser scanner, rilievi topografici',
            'description' => 'Rilievo gps, rilievo laser scanner, rilievo celerimetrico e rilievo topografico per piani quotati, frazionamenti e tracciamenti, accatastamenti e riconfinazioni'
        ]);
    }

    /**
     * @Route("/contatti", name="contatti", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function contattiAction()
    {
        return $this->render('pages/contatti.html.twig', [
            'title' => 'Contatti',
            'description' => 'Contatti. Indirizzo mail. Vestenanova, Verona, Veneto'
        ]);
    }

    /**
     * @Route("/rilievi-laser-scanner-3d", name="rilievi_laser_scanner_3d", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function rilieviLaserScanner3dAction() {
        return $this->render('pages/rilievi-laser-scanner-3d.html.twig', [
            'title' => 'Rilievi Topografici  con laser scanner 3d Leica ScanStation C10',
            'description' => 'Rilievi Topografici con laser scanner 3d Leica ScanStation C10 eseguiti da'
        ]);
    }

}
