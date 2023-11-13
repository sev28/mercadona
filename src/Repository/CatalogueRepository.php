<?php

namespace App\Repository;

use App\Entity\Catalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Catalogue>
 *
 * @method Catalogue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Catalogue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Catalogue[]    findAll()
 * @method Catalogue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Catalogue::class);
    }

}
