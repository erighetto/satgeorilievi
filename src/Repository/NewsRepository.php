<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NewsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @return int
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
     * @param $page
     * @return array
     */
    public function paginateNews($page): array
    {

        $qb = $this->createQueryBuilder('n')
            ->select('n.title', 'n.posted', 'n.data', 'n.link')
            ->where('n.approved = 1')
            ->orderBy('n.id', 'DESC')
            ->setFirstResult($page)
            ->setMaxResults(30)
            ->getQuery();

        return $qb->execute();
    }
}