<?php

namespace App\Controller;

use App\Service\Expertises;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/servizi-offerti")
 */
class WhatwedoController extends Controller
{
    /**
     * @var Expertises
     */
    protected $expertises;

    /**
     * WhatwedoController constructor.
     */
    public function __construct()
    {
        $object = new Expertises();
        $this->expertises = $object->getItems();
    }

    /**
     * @Route("/accatastamenti-riconfinazioni", name="accatastamenti_riconfinazioni", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function accatastamentiRiconfinazioniAction()
    {
        return $this->render(
            'whatwedo/accatastamenti-riconfinazioni.html.twig',
            $this->expertises['accatastamenti-riconfinazioni']
        );
    }

    /**
     * @Route("/progettazione-edile", name="progettazione_edile", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function progettazioneEdileAction()
    {
        return $this->render(
            'whatwedo/progettazione-edile.html.twig',
            $this->expertises['progettazione-edile']
        );
    }


    /**
     * @Route("/rilievi-topografici", name="rilievi_topografici", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function rilieviTopograficiAction()
    {
        return $this->render(
            'whatwedo/rilievi-topografici.html.twig',
            $this->expertises['rilievi-topografici']
        );
    }

    /**
     * @Route("/frazionamenti-lottizzazioni", name="frazionamenti_lottizzazioni", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function frazionamentiLottizzazioniAction()
    {
        return $this->render(
            'whatwedo/frazionamenti-lottizzazioni.html.twig',
            $this->expertises['frazionamenti-lottizzazioni']
        );
    }

    /**
     * @Route("/piani-quotati", name="piani_quotati", options={"sitemap" = {"priority" = 0.7, "changefreq" = "weekly" }})
     */
    public function pianiQuotatiAction()
    {
        return $this->render(
            'whatwedo/piani-quotati.html.twig',
            $this->expertises['piani-quotati']
        );
    }

}
