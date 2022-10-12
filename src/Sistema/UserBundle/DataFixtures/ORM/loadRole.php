<?php

namespace Sistema\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sistema\UserBundle\Entity\Role;

class loadRole extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $roles = array(
            '0'  => array('roleName' => 'SUPERADMIN'),
            '1'  => array('roleName' => 'ADMIN'),
            '2'  => array('roleName' => 'AFILIADO'),
        );

        foreach ($roles as $key => $r) {
            $role = new Role();
            $role->setRoleName($r['roleName']);
            $role->serialize();
            $this->addReference($role->getName(), $role);
            $manager->persist($role);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

}