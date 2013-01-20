<?php

namespace CollDev\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CollDev\MainBundle\Entity\Restriction;
use CollDev\MainBundle\Form\RestrictionType;

/**
 * Restriction controller.
 *
 * @Route("/restriction")
 */
class RestrictionController extends Controller
{
    /**
     * Lists all Restriction entities.
     *
     * @Route("/", name="restriction")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollDevMainBundle:Restriction')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Restriction entity.
     *
     * @Route("/{id}/show", name="restriction_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Restriction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restriction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Restriction entity.
     *
     * @Route("/new", name="restriction_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Restriction();
        $form   = $this->createForm(new RestrictionType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Restriction entity.
     *
     * @Route("/create", name="restriction_create")
     * @Method("POST")
     * @Template("CollDevMainBundle:Restriction:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Restriction();
        $form = $this->createForm(new RestrictionType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('restriction_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Restriction entity.
     *
     * @Route("/{id}/edit", name="restriction_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Restriction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restriction entity.');
        }

        $editForm = $this->createForm(new RestrictionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Restriction entity.
     *
     * @Route("/{id}/update", name="restriction_update")
     * @Method("POST")
     * @Template("CollDevMainBundle:Restriction:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Restriction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Restriction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RestrictionType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('restriction_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Restriction entity.
     *
     * @Route("/{id}/delete", name="restriction_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CollDevMainBundle:Restriction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Restriction entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('restriction'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
