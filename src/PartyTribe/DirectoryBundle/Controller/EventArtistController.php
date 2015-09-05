<?php

namespace PartyTribe\DirectoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PartyTribe\DirectoryBundle\Entity\EventArtist;
use PartyTribe\DirectoryBundle\Form\EventArtistType;

/**
 * EventArtist controller.
 *
 * @Route("/eventartist")
 */
class EventArtistController extends Controller
{

    /**
     * Lists all EventArtist entities.
     *
     * @Route("/", name="eventartist")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyTribeDirectoryBundle:EventArtist')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new EventArtist entity.
     *
     * @Route("/", name="eventartist_create")
     * @Method("POST")
     * @Template("PartyTribeDirectoryBundle:EventArtist:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new EventArtist();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('eventartist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a EventArtist entity.
     *
     * @param EventArtist $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EventArtist $entity)
    {
        $form = $this->createForm(new EventArtistType(), $entity, array(
            'action' => $this->generateUrl('eventartist_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EventArtist entity.
     *
     * @Route("/new", name="eventartist_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new EventArtist();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a EventArtist entity.
     *
     * @Route("/{id}", name="eventartist_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:EventArtist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventArtist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing EventArtist entity.
     *
     * @Route("/{id}/edit", name="eventartist_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:EventArtist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventArtist entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a EventArtist entity.
    *
    * @param EventArtist $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EventArtist $entity)
    {
        $form = $this->createForm(new EventArtistType(), $entity, array(
            'action' => $this->generateUrl('eventartist_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EventArtist entity.
     *
     * @Route("/{id}", name="eventartist_update")
     * @Method("PUT")
     * @Template("PartyTribeDirectoryBundle:EventArtist:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:EventArtist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EventArtist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('eventartist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a EventArtist entity.
     *
     * @Route("/{id}", name="eventartist_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyTribeDirectoryBundle:EventArtist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EventArtist entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('eventartist'));
    }

    /**
     * Creates a form to delete a EventArtist entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventartist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
