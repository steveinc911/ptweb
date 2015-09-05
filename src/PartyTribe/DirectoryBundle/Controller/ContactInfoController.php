<?php

namespace PartyTribe\DirectoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PartyTribe\DirectoryBundle\Entity\ContactInfo;
use PartyTribe\DirectoryBundle\Form\ContactInfoType;

/**
 * ContactInfo controller.
 *
 * @Route("/contactinfo")
 */
class ContactInfoController extends Controller
{

    /**
     * Lists all ContactInfo entities.
     *
     * @Route("/", name="contactinfo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyTribeDirectoryBundle:ContactInfo')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ContactInfo entity.
     *
     * @Route("/", name="contactinfo_create")
     * @Method("POST")
     * @Template("PartyTribeDirectoryBundle:ContactInfo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ContactInfo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contactinfo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ContactInfo entity.
     *
     * @param ContactInfo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ContactInfo $entity)
    {
        $form = $this->createForm(new ContactInfoType(), $entity, array(
            'action' => $this->generateUrl('contactinfo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ContactInfo entity.
     *
     * @Route("/new", name="contactinfo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ContactInfo();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ContactInfo entity.
     *
     * @Route("/{id}", name="contactinfo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ContactInfo entity.
     *
     * @Route("/{id}/edit", name="contactinfo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
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
    * Creates a form to edit a ContactInfo entity.
    *
    * @param ContactInfo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ContactInfo $entity)
    {
        $form = $this->createForm(new ContactInfoType(), $entity, array(
            'action' => $this->generateUrl('contactinfo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ContactInfo entity.
     *
     * @Route("/{id}", name="contactinfo_update")
     * @Method("PUT")
     * @Template("PartyTribeDirectoryBundle:ContactInfo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ContactInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('contactinfo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ContactInfo entity.
     *
     * @Route("/{id}", name="contactinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyTribeDirectoryBundle:ContactInfo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ContactInfo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('contactinfo'));
    }

    /**
     * Creates a form to delete a ContactInfo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contactinfo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
