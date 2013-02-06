<?php

namespace CollDev\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CollDev\MainBundle\Entity\Joke;
use CollDev\MainBundle\Form\JokeType;

/**
 * Joke controller.
 *
 * @Route("/joke")
 */
class JokeController extends Controller
{
    /**
     * Lists all Joke entities.
     *
     * @Route("/", name="joke")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollDevMainBundle:Joke')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Joke entity.
     *
     * @Route("/{id}/show", name="joke_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Joke')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joke entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($entity->getUser()->getId() != $user->getId()) {
            $entity->oneVisit();
            $em->persist($entity);
            $em->flush();
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Joke entity.
     *
     * @Route("/new", name="joke_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Joke();
        $form   = $this->createForm(new JokeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Joke entity.
     *
     * @Route("/create", name="joke_create")
     * @Method("POST")
     * @Template("CollDevMainBundle:Joke:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Joke();
        $form = $this->createForm(new JokeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->get('security.context')->getToken()->getUser();
            $entity->setUser($user);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('joke_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Joke entity.
     *
     * @Route("/{id}/edit", name="joke_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Joke')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joke entity.');
        }

        $editForm = $this->createForm(new JokeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Joke entity.
     *
     * @Route("/{id}/update", name="joke_update")
     * @Method("POST")
     * @Template("CollDevMainBundle:Joke:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollDevMainBundle:Joke')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Joke entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new JokeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('joke_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Joke entity.
     *
     * @Route("/{id}/delete", name="joke_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CollDevMainBundle:Joke')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Joke entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('joke'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
