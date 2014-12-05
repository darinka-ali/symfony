<?php

namespace Test\Bundle\Testbundle\Bundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\Bundle\Testbundle\Bundle\Entity\questionnaire;
use Test\Bundle\Testbundle\Bundle\Form\questionnaireType;

/**
 * questionnaire controller.
 *
 */
class questionnaireController extends Controller
{

    /**
     * Lists all questionnaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TestTestbundleBundle:questionnaire')->findAll();

        return $this->render('TestTestbundleBundle:questionnaire:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new questionnaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new questionnaire();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Test_questionnaire_show', array('id' => $entity->getId())));
        }

        return $this->render('TestTestbundleBundle:questionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a questionnaire entity.
     *
     * @param questionnaire $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(questionnaire $entity)
    {
        $form = $this->createForm(new questionnaireType(), $entity, array(
            'action' => $this->generateUrl('Test_questionnaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new questionnaire entity.
     *
     */
    public function newAction()
    {
        $entity = new questionnaire();
        $form   = $this->createCreateForm($entity);

        return $this->render('TestTestbundleBundle:questionnaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a questionnaire entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestTestbundleBundle:questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find questionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestTestbundleBundle:questionnaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing questionnaire entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestTestbundleBundle:questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find questionnaire entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TestTestbundleBundle:questionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a questionnaire entity.
    *
    * @param questionnaire $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(questionnaire $entity)
    {
        $form = $this->createForm(new questionnaireType(), $entity, array(
            'action' => $this->generateUrl('Test_questionnaire_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing questionnaire entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TestTestbundleBundle:questionnaire')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find questionnaire entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Test_questionnaire_edit', array('id' => $id)));
        }

        return $this->render('TestTestbundleBundle:questionnaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a questionnaire entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TestTestbundleBundle:questionnaire')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find questionnaire entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Test_questionnaire'));
    }

    /**
     * Creates a form to delete a questionnaire entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Test_questionnaire_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
