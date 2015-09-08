<?php

namespace PartyTribe\DirectoryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PartyTribe\DirectoryBundle\Entity\ActivityLog;
use PartyTribe\DirectoryBundle\Form\ActivityLogType;

/**
 * ActivityLog controller.
 *
 * @Route("/activitylog")
 */
class ActivityLogController extends Controller
{

    /**
     * Lists all ActivityLog entities.
     *
     * @Route("/", name="activitylog")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PartyTribeDirectoryBundle:ActivityLog')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new ActivityLog entity.
     *
     * @Route("/", name="activitylog_create")
     * @Method("POST")
     * @Template("PartyTribeDirectoryBundle:ActivityLog:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new ActivityLog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('activitylog_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a ActivityLog entity.
     *
     * @param ActivityLog $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ActivityLog $entity)
    {
        $form = $this->createForm(new ActivityLogType(), $entity, array(
            'action' => $this->generateUrl('activitylog_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ActivityLog entity.
     *
     * @Route("/new", name="activitylog_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new ActivityLog();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a ActivityLog entity.
     *
     * @Route("/{id}", name="activitylog_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ActivityLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityLog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing ActivityLog entity.
     *
     * @Route("/{id}/edit", name="activitylog_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ActivityLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityLog entity.');
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
    * Creates a form to edit a ActivityLog entity.
    *
    * @param ActivityLog $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ActivityLog $entity)
    {
        $form = $this->createForm(new ActivityLogType(), $entity, array(
            'action' => $this->generateUrl('activitylog_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ActivityLog entity.
     *
     * @Route("/{id}", name="activitylog_update")
     * @Method("PUT")
     * @Template("PartyTribeDirectoryBundle:ActivityLog:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PartyTribeDirectoryBundle:ActivityLog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ActivityLog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('activitylog_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a ActivityLog entity.
     *
     * @Route("/{id}", name="activitylog_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PartyTribeDirectoryBundle:ActivityLog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ActivityLog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('activitylog'));
    }

    /**
     * Creates a form to delete a ActivityLog entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activitylog_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
