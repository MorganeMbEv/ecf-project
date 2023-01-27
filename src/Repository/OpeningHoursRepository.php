<?php

namespace App\Repository;

use App\Entity\OpeningHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpeningHours>
 *
 * @method OpeningHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpeningHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpeningHours[]    findAll()
 * @method OpeningHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpeningHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpeningHours::class);
    }

    public function save(OpeningHours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpeningHours $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OpeningHours[] Returns an array of OpeningHours objects
//     */
<<<<<<< HEAD
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
=======
//    public function displayBookingHours(): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('DATE_ADD(o.lunchOpening,15 , "MINUTE")')
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(7)
>>>>>>> 52acf636672c4add4bec17a55d465065e3cfe9e6
//            ->getQuery()
//            ->getResult()
//        ;
//    }
<<<<<<< HEAD

=======
>>>>>>> 52acf636672c4add4bec17a55d465065e3cfe9e6
//    public function findOneBySomeField($value): ?OpeningHours
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
