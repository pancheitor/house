<?php

namespace Pedro\HouseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pedro\HouseBundle\Entity\Luminosidad;
use Pedro\HouseBundle\Form\LuminosidadType;

/**
 * Luminosidad controller.
 *
 * @Route("/luminosidad")
 */
class LuminosidadController extends Controller
{
    /**
     * Lists all Luminosidad entities.
     *
     * @Route("/", name="luminosidad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $luminosidads = $em->getRepository('PedroHouseBundle:Luminosidad')->findAll();

        return $this->render('luminosidad/index.html.twig', array(
            'luminosidads' => $luminosidads,
        ));
    }

    /**
     * Creates a new Luminosidad entity.
     *
     * @Route("/new", name="luminosidad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $luminosidad = new Luminosidad();
        $form = $this->createForm('Pedro\HouseBundle\Form\LuminosidadType', $luminosidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($luminosidad);
            $em->flush();

            return $this->redirectToRoute('luminosidad_show', array('id' => $luminosidad->getId()));
        }

        return $this->render('luminosidad/new.html.twig', array(
            'luminosidad' => $luminosidad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Luminosidad entity.
     *
     * @Route("/{id}", name="luminosidad_show")
     * @Method("GET")
     */
    public function showAction(Luminosidad $luminosidad)
    {
        $deleteForm = $this->createDeleteForm($luminosidad);

        return $this->render('luminosidad/show.html.twig', array(
            'luminosidad' => $luminosidad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Luminosidad entity.
     *
     * @Route("/{id}/edit", name="luminosidad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Luminosidad $luminosidad)
    {
        $deleteForm = $this->createDeleteForm($luminosidad);
        $editForm = $this->createForm('Pedro\HouseBundle\Form\LuminosidadType', $luminosidad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($luminosidad);
            $em->flush();

            return $this->redirectToRoute('luminosidad_edit', array('id' => $luminosidad->getId()));
        }

        return $this->render('luminosidad/edit.html.twig', array(
            'luminosidad' => $luminosidad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Luminosidad entity.
     *
     * @Route("/{id}", name="luminosidad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Luminosidad $luminosidad)
    {
        $form = $this->createDeleteForm($luminosidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($luminosidad);
            $em->flush();
        }

        return $this->redirectToRoute('luminosidad_index');
    }

    /**
     * Creates a form to delete a Luminosidad entity.
     *
     * @param Luminosidad $luminosidad The Luminosidad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Luminosidad $luminosidad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('luminosidad_delete', array('id' => $luminosidad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
