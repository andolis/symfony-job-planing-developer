<?php

namespace App\Repository;

use App\Entity\Tasks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Tasks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tasks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tasks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TasksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tasks::class);
    }

    // /**
    //  * @return Tasks[] Returns an array of Tasks objects
    //  */

    public function findAll()
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.time', 'ASC')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
