<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
    /**
     * @Route("/", name="news_index", methods="GET")
     */
    public function indexAction(): Response
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();

        $sql = "SELECT count(id) FROM items_satgeorilievi WHERE approved=1";
        $count = $app['db']->fetchColumn($sql);

        /** @var \Kilte\Pagination\Pagination $pagination */
        $pagination = $app['pagination']($count, $page);
        $pages = $pagination->build();

        $queryBuilder = $app['db']->createQueryBuilder();

        $queryBuilder
            ->select('title', 'posted', 'data', 'link')
            ->from('items_satgeorilievi')
            ->where('approved = 1')
            ->orderBy('id', 'DESC')
            ->setFirstResult($page)
            ->setMaxResults($app['pagination.per_page']);

        $news = $queryBuilder->execute()->fetchAll();

        if ($page > 1) {
            $queryBuilder = $app['db']->createQueryBuilder();
            $queryBuilder
                ->select('title')
                ->from('items_satgeorilievi')
                ->where('approved = 1')
                ->orderBy('id', 'DESC')
                ->setFirstResult($page)
                ->setMaxResults(1);

            $property = $queryBuilder->execute()->fetch();
            $title = $property['title'];
            $desc = substr(strip_tags($property['data']), 0, 100);
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
     */
    public function showAction(News $news): Response
    {
        return $this->render('news/show.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/{id}/edit", name="news_edit", methods="GET|POST")
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
