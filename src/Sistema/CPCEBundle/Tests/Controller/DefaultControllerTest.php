<?php

namespace Sistema\CPCEBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client = null;

    public function setUp()
    {
        $this->client = $this->createAuthorizedClient();
    }

    /**
     * @return Client
     */
    protected function createAuthorizedClient()
    {
        $client = static::createClient(array(), array(
            'HTTP_HOST' => 'gestion.cpceweb.dev',
        ));
        $container = $client->getContainer();

        $session = $container->get('session');
        /** @var $userManager \FOS\UserBundle\Doctrine\UserManager */
        $userManager = $container->get('fos_user.user_manager');
        /** @var $loginManager \FOS\UserBundle\Security\LoginManager */
        $loginManager = $container->get('fos_user.security.login_manager');
        $firewallName = 'main';

        $user = $userManager->findUserBy(array('username' => 'test'));

        $loginManager->loginUser($firewallName, $user);

        // save the login token into the session and put it in a cookie
        $container->get('session')->set('_security_' . $firewallName,
            serialize($container->get('security.context')->getToken()));
        $session->set('afiliado', $user);
        $container->get('session')->save();
        $client->getCookieJar()->set(new Cookie($session->getName(), $session->getId()));

        return $client;
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/matriculado/');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Identificado como test")')->count());
    }

    private function createTrabajo($montos)
    {
        $crawler = $this->client->request('GET', '/matriculado/trabajos');

        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $crawler = $this->client->click($crawler->selectLink('Confeccionar Trabajo')->link());
        // Fill in the form and submit it
        $form = $crawler->selectButton('Seleccionar')->form();
        $crawler = $this->client->submit($form, array(
            'cpce_trabajo_front[comitenteCuit]' => '11111111111'
        ));
        // Fill in the form and submit it
        $form = $crawler->selectButton('Continuar')->form();
        $crawler = $this->client->submit($form, array(
            'cpce_trabajo_front[importe1]' => $montos['importe1'],
            'cpce_trabajo_front[importe2]' => $montos['importe2'],
        ));

        return $crawler;
    }

    private function confirmarMontoMalTrabajo($montos)
    {
        $crawler = $this->createTrabajo($montos);
        // Fill in the form and submit it
        $form = $crawler->selectButton('Confirmar')->form();
        $crawler = $this->client->submit($form, array(
            'cpce_trabajo_front[monto]' => $montos['montoMal'],
        ));
        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('html:contains("El Monto a depositar no supera el monto mínimo de Honorarios")')->count());
    }
    private function confirmarMontoBienTrabajo($montos)
    {
        $crawler = $this->createTrabajo($montos);
        // Fill in the form and submit it
        $form = $crawler->selectButton('Confirmar')->form();
        $this->client->submit($form, array(
            'cpce_trabajo_front[monto]' => $montos['montoBien'],
        ));
        $crawler = $this->client->followRedirect();
        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Elemento creado satisfactoriamente")')->count());
    }

    public function testTrabajo()
    {
        $montosArray = array(
            0 => array('importe1'  => '10000',  'importe2'  => '12400',   'montoMal'  => '999',  'montoBien' => '1000'),
            1 => array('importe1'  => '12400',  'importe2'  => '24800',   'montoMal'  => '1115', 'montoBien' => '1116'),
            2 => array('importe1'  => '24800',  'importe2'  => '49600',   'montoMal'  => '1562', 'montoBien' => '1562.4'),
            3 => array('importe1'  => '49600',  'importe2'  => '99200',   'montoMal'  => '1859', 'montoBien' => '1860'),
            4 => array('importe1'  => '99200',  'importe2'  => '198400',  'montoMal'  => '2336', 'montoBien' => '2336.16'),
            5 => array('importe1'  => '198400', 'importe2'  => '396800',  'montoMal'  => '3169', 'montoBien' => '3169.44'),
            6 => array('importe1'  => '396800', 'importe2'  => '793600',  'montoMal'  => '4597', 'montoBien' => '4597.92'),
            7 => array('importe1'  => '793600', 'importe2'  => '1587200', 'montoMal'  => '6978', 'montoBien' => '6978.72'),
        );
        foreach ($montosArray as $montos) {
            $this->confirmarMontoMalTrabajo($montos);
            $this->confirmarMontoBienTrabajo($montos);
        }
    }
}