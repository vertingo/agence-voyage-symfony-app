<?php

namespace App\Repository;

use App\Entity\Avion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Avion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avion[]    findAll()
 * @method Avion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Avion::class);
    }
}
