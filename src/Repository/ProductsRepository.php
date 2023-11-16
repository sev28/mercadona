<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Products;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\BrowserKit\Request;

/**
 * @extends ServiceEntityRepository<Products>
 *
 * @method Products|null find($id, $lockMode = null, $lockVersion = null)
 * @method Products|null findOneBy(array $criteria, array $orderBy = null)
 * @method Products[]    findAll()
 * @method Products[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Products::class);
        
    }
//    /**
//     * @return PaginationInterface 
//     */
    public function findSearch(SearchData $search)
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('c', 'p')
            ->join('p.category', 'c');

        if (!empty($search->q)) {
            $query = $query
                ->andWhere('p.title LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }
        if(!empty($search->categories)){
            $query = $query
                ->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }
        return $query->getQuery()->getResult();
    }

    // public function paginationQuery()
    // {
    //     return $this->createQueryBuilder('a')
    //     ->orderBy('a.id', 'ASC')
    //     ->getQuery();
    // }
}
