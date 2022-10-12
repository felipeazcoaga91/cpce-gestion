<?php

namespace Sistema\CPCEBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TotalesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TotalesRepository extends EntityRepository
{
    //Obtiene los totales al dia de hoy segun cuenta
    function getQueryTotalesByAfiliado($tipdoc, $nrodoc, $fecven) {
        return $this->createQueryBuilder('a')
            ->select('plancuen.plaNropla AS cuenta, plancuen.plaNombre AS servicio, SUM(a.totDebe - a.totHaber) AS saldo')
            ->join('a.totNropla', 'plancuen')
            ->where('a.totTipdoc = :tipdoc')
            ->andWhere('a.totNrodoc = :nrodoc')
            ->andWhere('a.totEstado <> :estado')
            ->andWhere('a.totFecven <= :fecven')
            ->andWhere('plancuen.plaMuestraweb = :muestraweb')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->setParameter('estado', '9')
            ->setParameter('fecven', $fecven)
            ->setParameter('muestraweb', true)
            ->groupBy('plancuen.plaNropla')
        ;
    }
    //Obtiene los totales completos segun cuenta
    function getQueryTotalesCompletoByAfiliado($tipdoc, $nrodoc) {
        return $this->createQueryBuilder('a')
            ->select('SUM(a.totDebe - a.totHaber) AS saldo')
            ->join('a.totNropla', 'plancuen')
            ->where('a.totTipdoc = :tipdoc')
            ->andWhere('a.totNrodoc = :nrodoc')
            ->andWhere('a.totEstado <> :estado')
            ->andWhere('plancuen.plaMuestraweb = :muestraweb')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->setParameter('estado', '9')
            ->setParameter('muestraweb', true)
            ->groupBy('plancuen.plaNropla')
            ->getQuery()
            ->getResult()
        ;
    }
    //Obtiene los totales completos segun cuenta
    function getTotalesByComprobante($tipdoc, $nrodoc, $id) {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->where('a.totTipdoc = :tipdoc')
            ->andWhere('a.totNrodoc = :nrodoc')
            ->andWhere('a.totEstado <> :estado')
            ->andWhere("a.totNrocom = :id")
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->setParameter('id', $id)
            ->setParameter('estado', '9')
            ->getQuery()
            ->getResult()
        ;
    }
    //Obtiene los totales completos segun NRO_ASI
    function getTotalesByNroAsi($id) {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->where("a.totNroasi = :id")
            ->andWhere('a.totEstado <> :estado')
            ->setParameter('id', $id)
            ->setParameter('estado', '9')
            ->getQuery()
            ->getResult()
        ;
    }
    //Obtiene el detalle con el saldo al dia de hoy
    function findDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta) {
        $fecven = new \DateTime('Today');
        //Agrego 10 dias para que el 1ero traiga la cuota que vence el 10
        $fecven->modify('+10 day');
        return $this->createQueryBuilder('a')
            ->select('
                plancuen.plaNropla AS cuenta, plancuen.plaNombre AS servicio,
                a.totFecha AS fecha, a.totFecven AS vence,
                a.totDebe AS debe, a.totHaber AS haber,
                a.totNrocuo AS nrocuota,
                (a.totDebe - a.totHaber) AS saldo,
                a.totNroasi AS asiento
            ')
            ->join('a.totNropla', 'plancuen')
            ->where('a.totTipdoc = :tipdoc')
            ->andWhere('a.totNrodoc = :nrodoc')
            ->andWhere('a.totNropla = :nropla')
            ->andWhere('a.totEstado <> :estado')
            ->andWhere('a.totFecven <= :fecven')
            ->andWhere('plancuen.plaMuestraweb = :muestraweb')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->setParameter('nropla', $cuenta)
            ->setParameter('estado', '9')
            ->setParameter('fecven', $fecven)
            ->setParameter('muestraweb', true)
            ->orderBy('a.totFecha')
            ->getQuery()
            ->getResult()
        ;
    }
    //Obtiene el detalle con el saldo total completo
    function findSaldoTotalDetalleByAfiliadoCuenta($tipdoc, $nrodoc, $cuenta) {
        return $this->createQueryBuilder('a')
            ->select('
                SUM(a.totDebe - a.totHaber) AS saldo
            ')
            ->join('a.totNropla', 'plancuen')
            ->where('a.totTipdoc = :tipdoc')
            ->andWhere('a.totNrodoc = :nrodoc')
            ->andWhere('a.totNropla = :nropla')
            ->andWhere('a.totEstado <> :estado')
            ->andWhere('plancuen.plaMuestraweb = :muestraweb')
            ->setParameter('tipdoc', $tipdoc)
            ->setParameter('nrodoc', $nrodoc)
            ->setParameter('nropla', $cuenta)
            ->setParameter('estado', '9')
            ->setParameter('muestraweb', true)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}