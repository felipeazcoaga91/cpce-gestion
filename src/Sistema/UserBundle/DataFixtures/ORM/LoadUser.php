<?php

namespace Sistema\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Sistema\UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        //Creando Admin !!
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setEnabled(true);
        $user->setPassword('admin');
        $user->setTipdoc('DNI');
        $user->setNrodoc(1);
        $user->addRole($this->getReference('ROLE_SUPERADMIN'));
        // Completar las propiedades que el usuario no rellena en el formulario
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $passwordCodificado = $encoder->encodePassword(
            $user->getPassword(),
            $user->getSalt()
        );
        $user->setPassword($passwordCodificado);
        // Guardar el nuevo usuario en la base de datos
        $manager->persist($user);
        $manager->flush();
        $this->addReference("admin", $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
