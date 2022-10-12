<?php

namespace Sistema\CPCEBundle\Mailer;

use FOS\UserBundle\Model\UserInterface;

class CustomCpceMailer
{
    protected $mailer;
    protected $twig;
    protected $parameters;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig, array $parameters)
    {
        $this->mailer     = $mailer;
        $this->twig       = $twig;
        $this->parameters = $parameters;
    }

    /* Se envia correo al sistema con los datos de los familiares que se modificaron/cargaron */
    public function sendNewFamiliaresEmailMessage($entity) {
        $contenido = $entity;
     // Obteniendo la fecha actual del sistema con PHP
        $fechaActual = date('d/m/Y');
        $template  = $this->parameters['template']['familiares'];
        $context = array(
            'contenido' => $contenido,
            'fecha' => $fechaActual
        );

        $this->sendMessage($template, $context, $this->parameters['from_email']['webmaster'], "beneficiosfamiliares@cpcechaco.org.ar");
    }  

    /* Se envia correo al matriculado avisando que su trabajo se encuentra FINALIZADO */
    public function sendTrabajoFinalizadoEmailMessage(UserInterface $user, $trabajoCodigo)
    {
        $contenido = "Su trabajo código nro. ".$trabajoCodigo." se encuentra listo para ser retirado.";
        $template  = $this->parameters['template']['trabajo_estado'];
        $context = array(
            'contenido' => $contenido
        );

        $this->sendMessage($template, $context, $this->parameters['from_email']['trabajo_estado'], $user->getEmail());
    }
    /* Se envia correo al matriculado avisando que su trabajo NO se encuentra FINALIZADO */
    public function sendTrabajoRevisionEmailMessage(UserInterface $user, $trabajoCodigo)
    {
        $contenido = "Se le solicita acercarse a su Delegación, trabajo código nro. ".$trabajoCodigo;
        $template  = $this->parameters['template']['trabajo_estado'];
        $context = array(
            'contenido' => $contenido
        );

        $this->sendMessage($template, $context, $this->parameters['from_email']['trabajo_estado'], $user->getEmail());
    }
    /* Se envia correo con CV adjunto a la empresa avisando que tiene postulante */
    public function sendPostulanteCvEmailMessage(UserInterface $user, $oferta)
    {
        $contenido = "Se adjunta CV del profesional a la oferta " . $oferta->getSolicitante();
        $template  = $this->parameters['template']['postulante_cv'];
        $context = array(
            'contenido' => $contenido
        );

        $this->sendMessageAtach($template, $context, $this->parameters['from_email']['postulante_cv'], $oferta->getEmail(), $user->getUserCurriculum());
    }

    /**
     * @param string $templateName
     * @param array  $context
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendMessageAtach($templateName, $context, $fromEmail, $toEmail, $archive)
    {
        //traigo mail con copia seteado en parameter
        $CC2 = $this->parameters['cc_email']['cc_to'];

        $message = \Swift_Message::newInstance();

        //agrego CV adjunto
        $atach = __DIR__ . "/../../../../app/archivos/" . $archive->getFilePath();
        $atachment = \Swift_Attachment::newInstance();
        
        $urlLogo = __DIR__ . "/../../../../web/bundles/sistemacpce/images/header_logo.png";
        $context['cpce_logo'] = $message->embed(\Swift_Image::fromPath($urlLogo));

        $template = $this->twig->loadTemplate($templateName);
        $subject  = $template->renderBlock('subject', $context);
        $textBody = $template->renderBlock('body_text', $context);
        $htmlBody = $template->renderBlock('body_html', $context);

        $message
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            //->setCc($fromEmail) con copia a 1 email
            ->setCc(array($fromEmail, $CC2)) // con copia a varios email pasar en arreglo
            ->attach($atachment->fromPath($atach));
        ;

        if (!empty($htmlBody)) {
            $message->setBody($htmlBody, 'text/html')
                ->addPart($textBody, 'text/plain');
        } else {
            $message->setBody($textBody);
        }

        $this->mailer->send($message);
    }

    /**
     * @param string $templateName
     * @param array  $context
     * @param string $fromEmail
     * @param string $toEmail
     */
    protected function sendMessage($templateName, $context, $fromEmail, $toEmail)
    {
        $message = \Swift_Message::newInstance();
       // $urlLogo = __DIR__ . "/../../../../web/bundles/sistemacpce/images/header_logo.png";
       // $context['cpce_logo'] = $message->embed(\Swift_Image::fromPath($urlLogo));
        
        $template = $this->twig->loadTemplate($templateName);
        $subject  = $template->renderBlock('subject', $context);
        $textBody = $template->renderBlock('body_text', $context);
        $htmlBody = $template->renderBlock('body_html', $context);
        
        $message
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
        ;
  
        if (!empty($htmlBody)) {
            $message->setBody($htmlBody, 'text/html')
            ->addPart($textBody, 'text/plain');
        } else {
            $message->setBody($textBody);
        }
        $this->mailer->send($message);
    }
}