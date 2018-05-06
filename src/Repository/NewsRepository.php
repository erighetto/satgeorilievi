<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NewsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @return News[]
     */
    public function countAllApproved(): array
    {
        $qb = $this->createQueryBuilder('n')
            ->select('count(id)')
            ->where('approved=1')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @param $page
     * @return array
     */
    public function paginateNews($page): array {

        $qb = $this->createQueryBuilder('n')
            ->select('title', 'posted', 'data', 'link')
            ->where('approved = 1')
            ->orderBy('id', 'DESC')
            ->setFirstResult($page)
            ->setMaxResults(30)
            ->getQuery();

        return $qb->execute();
    }
}