<?php

namespace App\Repository;

use App\Entity\Bookings;
use App\Entity\Locations;
use App\Entity\Properties;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Properties|null find($id, $lockMode = null, $lockVersion = null)
 * @method Properties|null findOneBy(array $criteria, array $orderBy = null)
 * @method Properties[]    findAll()
 * @method Properties[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertiesRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Properties::class);
    }

    /**
     * Search Properties
     *
     * @param string|null     $location
     * @param boolean|null    $nearBeach
     * @param boolean|null    $acceptsPets
     * @param integer|null    $sleeps
     * @param integer|null    $beds
     * @param \DateTime|null  $startDate
     * @param \DateTime|null  $endDate
     *
     * @return Properties[]   Returns an array of Properties objects
     */
    public function search(
        $location = null,
        $nearBeach = null,
        $acceptsPets = null,
        $sleeps = null,
        $beds = null,
        $startDate = null,
        $endDate = null
    ) {
        $qb = $this->createQueryBuilder('p')
            ->select('p', 'l', 'b')
            ->leftJoin(
                Locations::class,
                'l',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'l.pk = p.fkLocation'
            )
            ->leftJoin(
                Bookings::class,
                'b',
                \Doctrine\ORM\Query\Expr\Join::WITH,
                'b.fkProperty = p.pk'
            );


        if (!empty($location)) {
            $qb->andWhere(
                $qb->expr()->like('l.locationName', ':locationName')
            )->setParameter('locationName', '%'.$location.'%');
        }

        if (!empty($nearBeach)) {
            $qb->andWhere(
                $qb->expr()->eq('p.nearBeach', ':nearBeach')
            )->setParameter('nearBeach', $nearBeach);
        }

        if (!empty($acceptsPets)) {
            $qb->andWhere(
                $qb->expr()->eq('p.acceptsPets', ':acceptsPets')
            )->setParameter('acceptsPets', $acceptsPets);
        }

        if (!empty($sleeps)) {
            $qb->andWhere(
                $qb->expr()->gte('p.sleeps', ':sleeps')
            )->setParameter('sleeps', $sleeps);
        }

        if (!empty($beds)) {
            $qb->andWhere(
                $qb->expr()->gte('p.beds', ':beds')
            )->setParameter('beds', $beds);
        }

        if (!empty($startDate) && !empty($endDate)) {
            $qb->andWhere(
                $qb->expr()->orX(
                    $qb->expr()->isNull('b.fkProperty'),
                    $qb->expr()->andX(
                        $qb->expr()->not(
                            $qb->expr()->gte('b.startDate', ':startDate')
                        ),
                        $qb->expr()->not(
                            $qb->expr()->lte('b.endDate', ':endDate')
                        )
                    )
                )
            )->setParameter('startDate', $startDate)
                ->setParameter('endDate', $endDate);
        }

        return $qb
            ->getQuery()
            ->getScalarResult();
    }
}
