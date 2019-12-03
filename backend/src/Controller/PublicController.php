<?php

namespace App\Controller;

use App\Entity\News;
use Kilte\Pagination\Pagination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/public")
 */
class PublicController extends AbstractController
{
    /**
     * @Route("/news", name="news_json", methods="GET")
     * @param Request $request
     * @return JsonResponse
     */
    public function jsonAction(Request $request): JsonResponse
    {
        $repository = $this->getDoctrine()
            ->getRepository(News::class);

        $count = $repository->countAllApproved();
        /** @var \Kilte\Pagination\Pagination $pagination */
        $pagination = new Pagination($count, 0, 10);
        $currentPage = $request->get('page');
        $news = $repository->paginateNews($currentPage, 10);

        return $this->json(
            [
                'items' => $news,
                'current_page' => $pagination->currentPage(),
                'total_pages' => $pagination->totalPages(),
            ],
            200,
            [
                'Access-Control-Allow-Origin' => '*',
            ]
        );
    }
}
