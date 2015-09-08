<?php

namespace PartyTribe\DirectoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PartyTribe\DirectoryBundle\Entity\BackofficeUser;
use PartyTribe\DirectoryBundle\Form\BackofficeUserType;

/**
 * BackofficeUser controller.
 *
 * @Route("/backofficeuser")
 */
class BackofficeUserController extends Controller
{

    /**
     * Lists all BackofficeUser entities.
     *
     * @Route("/", name="backofficeuser")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyTribeDirectoryBundle:BackofficeUser')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BackofficeUser entity.
     *
     * @Route("/", name="backofficeuser_create")
     * @Method("POST")
     * @Template("PartyTribeDirectoryBundle:BackofficeUser:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BackofficeUser();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('backofficeuser_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a BackofficeUser entity.
     *
     * @param BackofficeUser $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(BackofficeUser $entity)
    {
        $form = $this->createForm(new BackofficeUserType(), $entity, array(
            'action' => $this->generateUrl('backofficeuser_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BackofficeUser entity.
     *
     * @Route("/new", name="backofficeuser_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BackofficeUser();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BackofficeUser entity.
     *
     * @Route("/{id}", name="backofficeuser_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:BackofficeUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackofficeUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BackofficeUser entity.
     *
     * @Route("/{id}/edit", name="backofficeuser_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:BackofficeUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackofficeUser entity.');
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
    * Creates a form to edit a BackofficeUser entity.
    *
    * @param BackofficeUser $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BackofficeUser $entity)
    {
        $form = $this->createForm(new BackofficeUserType(), $entity, array(
            'action' => $this->generateUrl('backofficeuser_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BackofficeUser entity.
     *
     * @Route("/{id}", name="backofficeuser_update")
     * @Method("PUT")
     * @Template("PartyTribeDirectoryBundle:BackofficeUser:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:BackofficeUser')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BackofficeUser entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('backofficeuser_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BackofficeUser entity.
     *
     * @Route("/{id}", name="backofficeuser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyTribeDirectoryBundle:BackofficeUser')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BackofficeUser entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backofficeuser'));
    }

    /**
     * Creates a form to delete a BackofficeUser entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('backofficeuser_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
