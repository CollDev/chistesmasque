<?php

namespace CollDev\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CollDev\MainBundle\Entity\TimeZone;
use CollDev\MainBundle\Form\TimeZoneType;

/**
 * TimeZone controller.
 *
 * @Route("/timezone")
 */
class TimeZoneController extends Controller
{
    /**
     * Lists all TimeZone entities.
     *
     * @Route("/", name="timezone")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollDevMainBundle:TimeZone')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a TimeZone entity.
     *
     * @Route("/{id}/show", name="timezone_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:TimeZone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeZone entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new TimeZone entity.
     *
     * @Route("/new", name="timezone_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TimeZone();
        $form   = $this->createForm(new TimeZoneType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new TimeZone entity.
     *
     * @Route("/create", name="timezone_create")
     * @Method("POST")
     * @Template("CollDevMainBundle:TimeZone:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TimeZone();
        $form = $this->createForm(new TimeZoneType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timezone_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TimeZone entity.
     *
     * @Route("/{id}/edit", name="timezone_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:TimeZone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeZone entity.');
        }

        $editForm = $this->createForm(new TimeZoneType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing TimeZone entity.
     *
     * @Route("/{id}/update", name="timezone_update")
     * @Method("POST")
     * @Template("CollDevMainBundle:TimeZone:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:TimeZone')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TimeZone entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TimeZoneType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timezone_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a TimeZone entity.
     *
     * @Route("/{id}/delete", name="timezone_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CollDevMainBundle:TimeZone')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TimeZone entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('timezone'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
