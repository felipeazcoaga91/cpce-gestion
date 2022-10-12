<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * AfiliadoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AfiliadoRepository extends EntityRepository
{
    function findAfiliadoByDoc($tipdoc, $nrodoc) {
        return $this->createQueryBuilder('a')
            ->select("
                a.afiCategoria AS categoria,
                CONCAT(a.afiTitulo,a.afiMatricula,' - ',a.afiNombre) AS afiliado,
                c.catDescrip AS catDescripcion
            ")
            ->leftJoin('SistemaCPCEBundle:Categorias', 'c', 'WITH', 'c.catCodigo = a.afiCategoria')
            ->where('a.afiTipdoc = :tipdoc')
            ->andWhere('a.afiNrodoc = :nrodoc')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->getQuery()
            ->getOneOrNullResult(Query::HYDRATE_ARRAY);
    }

    function findComitenteByNro($tipdoc, $nrodoc) {
        return $this->createQueryBuilder('a')
            ->select("a")
            ->where('a.afiTipdoc = :tipdoc')
            ->andWhere('a.afiNrodoc = :nrodoc')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->getQuery()
            ->getOneOrNullResult();
    }

    function findAfiliadoCategoriaDescByDoc($tipdoc, $nrodoc) {
        return $this->createQueryBuilder('a')
            ->select("a, c.catDescrip AS catDescripcion")
            ->leftJoin('SistemaCPCEBundle:Categorias', 'c', 'WITH', 'c.catCodigo = a.afiCategoria')
            ->where('a.afiTipdoc = :tipdoc')
            ->andWhere('a.afiNrodoc = :nrodoc')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->getQuery()
            ->getOneOrNullResult();
    }

    function findAfiliadoByNroDoc($tipdoc, $nrodoc) {
        return $this->createQueryBuilder('a')
            ->select('a.afiTitulo, a.afiMatricula, a.afiNrodoc, a.afiNombre, a.afiCategoria')
            ->where('a.afiTipdoc = :tipdoc')
            ->andWhere('a.afiNrodoc = :nrodoc')
            ->andWhere("a.afiTitulo = 'CP' OR a.afiTitulo = 'LA' OR a.afiTitulo = 'LE'")
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->getQuery()
            ->getResult();
    }
    function findAfiliadoByMatricula($titulo, $matr) {
        return $this->createQueryBuilder('a')
            ->select('a.afiTitulo, a.afiMatricula, a.afiNrodoc, a.afiNombre, a.afiCategoria')
            ->where('a.afiTitulo = :titulo')
            ->andwhere('a.afiMatricula = :matr')
            ->setParameter('titulo', $titulo)
            ->setParameter('matr', $matr)
            ->getQuery()
            ->getResult();
    }
    function findAfiliadoByNombre($nombre) {
        return $this->createQueryBuilder('a')
            ->select('a.afiTitulo, a.afiMatricula, a.afiNrodoc, a.afiNombre, a.afiCategoria')
            ->setMaxResults('10')
            ->where("SUBSTRING_INDEX(a.afiNombre, ',', 1) LIKE :nombre")
            ->andWhere("a.afiTipo = 'A'")
            ->andWhere("a.afiTitulo = 'CP' OR a.afiTitulo = 'LA' OR a.afiTitulo = 'LE'")
            ->setParameter('nombre','%' . $nombre . '%')
            ->getQuery()
            ->getResult();
    }

}