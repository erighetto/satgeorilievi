<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsType;
use Kilte\Pagination\Pagination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news")
 */
class NewsController extends AbstractController
{
    /**
     * @Route("/", name="news_index", methods="GET")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $repository = $this->getDoctrine()
            ->getRepository(News::class);

        $count = $repository->countAllApproved();

        $page = $request->get('page');

        /** @var \Kilte\Pagination\Pagination $pagination */
        $pagination = new Pagination($count, 0, 10);
        $pages = $pagination->build();

        $news = $repository->paginateNews($page);

        if ($page > 1) {
            $title = $news[0]['title'];
            $desc = substr(strip_tags($news[0]['data']), 0, 100);
        } else {
            $title = "Notizie legate al laser scanner 3d Leica ScanStation C10";
            $desc = "SAT Georilievi seleziona le migliori notizie su Laser Scanning 3D";
        }

        return $this->render('news/index.html.twig', [
            'title' => $title,
            'description' => $desc,
            'pages' => $pages,
            'current' => $pagination->currentPage(),
            'news' => $news
        ]);
    }

    /**
     * @Route("/new", name="news_new", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('news_index');
        }

        return $this->render('news/new.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="news_show", methods="GET")
     * @param News $news
     * @return Response
     */
    public function showAction(News $news): Response
    {
        return $this->render('news/show.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/{id}/edit", name="news_edit", methods="GET|POST")
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function editAction(Request $request, News $news): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('news_edit', ['id' => $news->getId()]);
        }

        return $this->render('news/edit.html.twig', [
            'news' => $news,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="news_delete", methods="DELETE")
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function deleteAction(Request $request, News $news): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($news);
            $em->flush();
        }

        return $this->redirectToRoute('news_index');
    }

}
