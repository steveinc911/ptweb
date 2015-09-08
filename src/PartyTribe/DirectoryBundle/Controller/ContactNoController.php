<?php

namespace PartyTribe\DirectoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PartyTribe\DirectoryBundle\Entity\ContactNo;
use PartyTribe\DirectoryBundle\Form\ContactNoType;

/**
 * ContactNo controller.
 *
 * @Route("/contactno")
 */
class ContactNoController extends Controller
{

    /**
     * Lists all ContactNo entities.
     *
     * @Route("/", name="contactno")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyTribeDirectoryBundle:ContactNo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ContactNo entity.
     *
     * @Route("/", name="contactno_create")
     * @Method("POST")
     * @Template("PartyTribeDirectoryBundle:ContactNo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ContactNo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactno_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ContactNo entity.
     *
     * @param ContactNo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContactNo $entity)
    {
        $form = $this->createForm(new ContactNoType(), $entity, array(
            'action' => $this->generateUrl('contactno_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ContactNo entity.
     *
     * @Route("/new", name="contactno_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ContactNo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ContactNo entity.
     *
     * @Route("/{id}", name="contactno_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactNo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactNo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ContactNo entity.
     *
     * @Route("/{id}/edit", name="contactno_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactNo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactNo entity.');
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
    * Creates a form to edit a ContactNo entity.
    *
    * @param ContactNo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ContactNo $entity)
    {
        $form = $this->createForm(new ContactNoType(), $entity, array(
            'action' => $this->generateUrl('contactno_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ContactNo entity.
     *
     * @Route("/{id}", name="contactno_update")
     * @Method("PUT")
     * @Template("PartyTribeDirectoryBundle:ContactNo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactNo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactNo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contactno_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ContactNo entity.
     *
     * @Route("/{id}", name="contactno_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactNo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContactNo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contactno'));
    }

    /**
     * Creates a form to delete a ContactNo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contactno_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
