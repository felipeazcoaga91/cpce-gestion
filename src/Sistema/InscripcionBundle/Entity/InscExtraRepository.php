<?php

namespace Sistema\InscripcionBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * InscExtraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InscExtraRepository extends EntityRepository
{
    function findExtrasByMoldeId($moldeId) {
        return $this->createQueryBuilder('e')
            ->select('e')
            ->where('e.moldeId = :moldeId')
            ->setParameter('moldeId', $moldeId)
            ->getQuery()
            ->getResult()
        ;
    }
}