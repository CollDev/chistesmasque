<?php

namespace CollDev\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CollDev\MainBundle\Entity\Continent;
use CollDev\MainBundle\Form\ContinentType;

/**
 * Continent controller.
 *
 * @Route("/continent")
 */
class ContinentController extends Controller
{
    /**
     * Lists all Continent entities.
     *
     * @Route("/", name="continent")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollDevMainBundle:Continent')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Continent entity.
     *
     * @Route("/{id}/show", name="continent_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Continent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Continent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Continent entity.
     *
     * @Route("/new", name="continent_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Continent();
        $form   = $this->createForm(new ContinentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Continent entity.
     *
     * @Route("/create", name="continent_create")
     * @Method("POST")
     * @Template("CollDevMainBundle:Continent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Continent();
        $form = $this->createForm(new ContinentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('continent_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Continent entity.
     *
     * @Route("/{id}/edit", name="continent_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Continent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Continent entity.');
        }

        $editForm = $this->createForm(new ContinentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Continent entity.
     *
     * @Route("/{id}/update", name="continent_update")
     * @Method("POST")
     * @Template("CollDevMainBundle:Continent:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Continent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Continent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContinentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('continent_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Continent entity.
     *
     * @Route("/{id}/delete", name="continent_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CollDevMainBundle:Continent')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Continent entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('continent'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
