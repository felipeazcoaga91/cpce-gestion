<?php

namespace Sistema\InscripcionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\InscripcionBundle\Entity\InscFichaPerito;
use Sistema\InscripcionBundle\Form\InscAdminFichaPeritoType;

/**
 * InscFichaPerito controller admin.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/admin/inscripciones/peritos")
 */
class InscAdminFichaPeritoController extends Controller
{

    /**
     * Section Admin Inscripciones Peritos.
     *
     * @Route("/", name="admin_peritos_index")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SistemaInscripcionBundle:InscFichaPerito')->findAllFichasWithAfiliado();
            
        return array(
            'entities' => $entities,
        );
    }

    /**
     * New Admin Inscripcion Perito.
     *
     * @Route("/new", name="admin_peritos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {

        $em = $this->getDoctrine()->getManager();

        $entity = new InscFichaPerito();
        
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );   
    }

    /**
     * Creates a new Inscperito entity.
     *
     * @Route("/", name="admin_peritos_create")
     * @Method("POST")
     * @Template("SistemaInscripcionBundle:InscAdminFichaPerito:new.html.twig")
     */
    public function createAction() {

        $request = $this->getRequest();
        $entity = new InscFichaPerito();
        
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNrodoc());

            if ($afiliado) {
                $entity->setAfiTipDoc($afiliado->getAfiTipDoc());
                $entity->setAfiNroDoc($afiliado->getAfiNrodoc());
            } else {
                $this->get('session')->getFlashBag()->add('danger', 'No se encuentra en nro de dni ingresado.');

                $nextAction = $this->generateUrl('admin_peritos_new');
                return $this->redirect($nextAction);
            }
            
            $entity->setImporteTotal($entity->getMoldeId()->getImporteTotal());
            $entity->setMoldeId($entity->getMoldeId()->getId());

            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', 'Usted se ha inscripto correctamente');

            $nextAction = $this->generateUrl('admin_peritos_show', array('id' => $entity->getId()));
            
            return $this->redirect($nextAction);
        } else {
            $this->get('session')->getFlashBag()->add('danger', 'Hubo un problema al intentar validad el formulario.');

            $nextAction = $this->generateUrl('admin_peritos_new');
            return $this->redirect($nextAction);
        }
    }

    /**
     * Creates a form to create a entity.
     * @param array $config
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createCreateForm($entity) {

        $formType = new InscAdminFichaPeritoType();
        
        $form = $this->createForm($formType, $entity, array(
            'action' => $this->generateUrl('admin_peritos_create'),
            'method' => 'POST',
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => 'Generar',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-3',
                )
            ))
        ;

        return $form;
    }

    /**
     * Section Admin Inscripciones Peritos.
     *
     * @Route("/edit/{id}", name="admin_peritos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaPerito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }
        
        $editForm = $this->createEditForm($entity);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Creates a form to edit a entity.
     * @param array $config
     * @param $entity The entity
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createEditForm($entity)
    {
        $formType = new InscAdminFichaPeritoType();

        $form = $this->createForm($formType, $entity, array(
            'action' => $this->generateUrl('admin_peritos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form
            ->add('save', 'submit', array(
                'label'              => 'Actualizar',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-2',
                )
            ))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new InscFicha entity.
     *
     * @Route("/update/{id}", name="admin_peritos_update")
     * @Method("PUT")
     * @Template("SistemaInscripcionBundle:InscAdminFichaPerito:edit.html.twig")
     */
    public function updateAction($id)
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaPerito')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }
        
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNrodoc());

            if ($afiliado) {
                $entity->setAfiTipDoc($afiliado->getAfiTipDoc());
                $entity->setAfiNroDoc($afiliado->getAfiNrodoc());
            } else {
                $this->get('session')->getFlashBag()->add('danger', 'No se encuentra en nro de dni ingresado.');

                $nextAction = $this->generateUrl('admin_peritos_new');
                return $this->redirect($nextAction);
            }
            
            $entity->setImporteTotal($entity->getMoldeId()->getImporteTotal());
            $entity->setMoldeId($entity->getMoldeId()->getId());
            
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            $nextAction = $this->generateUrl('admin_peritos_index');
            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.update.error');

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Finds and displays a InscFicha entity.
     *
     * @Route("/{id}", name="admin_peritos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('SistemaInscripcionBundle:InscFichaPerito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ficha entity.');
        }

        $molde = $em->getRepository('SistemaInscripcionBundle:InscMolde')->find($entity->getMoldeId());
        $afiliado = $em->getRepository('SistemaCPCEBundle:Afiliado')->find($entity->getAfiNroDoc());
        
        return array(
            'entity' => $entity,
            'afiliado' => $afiliado,
            'molde' => $molde,
        );
    }

    /**
     * Autocomplete a Molde entity.
     *
     * @Route("/autocomplete-forms/get-molde", name="inscripcion_autocomplete_molde")
     */
    public function getAutocompleteMolde()
    {
        $options = array(
            'repository' => "SistemaInscripcionBundle:InscMolde",
            'field'      => "nombre",
        );
        
        $request = $this->getRequest();
        $term = $request->query->get('q', null);

        $qb = null;
        $tipo = $this->get('session')->get('tipo');

        if (is_null($qb)) {
            $em = $this->getDoctrine()->getManager();

            $qb = $em->getRepository($options['repository'])->createQueryBuilder('a');
            $qb
                ->where("a.".$options['field']." LIKE :term")
                ->orderBy("a.".$options['field'], "ASC")
            ;
        }

        $qb->setParameter("term", "%" . $term . "%");

        $entities = $qb->getQuery()->getResult();

        $array = array();

        foreach ($entities as $entity) {
            $array[] = array(
                'id'   => $entity->getId(),
                'text' => $entity->__toString(),
            );
        }

        $response = new JsonResponse();
        $response->setData($array);

        return $response;
    }

}