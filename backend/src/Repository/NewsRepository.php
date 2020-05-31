<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @return int
     * @throws \Doctrine\ORM\NoResultException
     */
    public function countAllApproved(): int
    {
        try {
            $tot = $this->createQueryBuilder('n')
                ->select('count(n.id)')
                ->where('n.approved = 1')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            $tot = 0;
        }

        return $tot;
    }

    /**
     * @param $currentPage
     * @param $perPage
     * @return array
     */
    public function paginateNews($currentPage, $perPage): array
    {

        $qb = $this->createQueryBuilder('n')
            ->select('n')
            ->where('n.approved = 1')
            ->orderBy('n.posted', 'DESC')
            ->setFirstResult($currentPage)
            ->setMaxResults($perPage)
            ->getQuery();

        return $qb->execute();
    }
}