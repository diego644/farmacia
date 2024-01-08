<?php

namespace App\Repository;

use App\Entity\Farmacia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Farmacia>
 *
 * @method Farmacia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Farmacia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Farmacia[]    findAll()
 * @method Farmacia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FarmaciaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Farmacia::class);
    }

    
/*
    public function findAllFarmacia(){
        return $this->getEntityManager()->createQuery('
        SELECT far.auditoria, far.creation_date, far.entregado_2, far.enviado_o_s, far.historia_clinica, far.obra_social, far.observaciones_farmacia, far.recibido, far.recibido_2, far.user_id
        FROM App:Farmacia far
        ')
        ->getResult();
    }
*/
//    /**
//     * @return Farmacia[] Returns an array of Farmacia objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Farmacia
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
