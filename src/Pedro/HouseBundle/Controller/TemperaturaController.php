<?php

namespace Pedro\HouseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pedro\HouseBundle\Entity\Temperatura;
use Pedro\HouseBundle\Form\TemperaturaType;

/**
 * Temperatura controller.
 *
 * @Route("/temperatura")
 */
class TemperaturaController extends Controller
{
    /**
     * Lists all Temperatura entities.
     *
     * @Route("/", name="temperatura_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $temperaturas = $em->getRepository('PedroHouseBundle:Temperatura')->findAll();

        return $this->render('temperatura/index.html.twig', array(
            'temperaturas' => $temperaturas,
        ));
    }

    /**
     * Creates a new Temperatura entity.
     *
     * @Route("/new", name="temperatura_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $temperatura = new Temperatura();
        $form = $this->createForm('Pedro\HouseBundle\Form\TemperaturaType', $temperatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($temperatura);
            $em->flush();

            return $this->redirectToRoute('temperatura_show', array('id' => $temperatura->getId()));
        }

        return $this->render('temperatura/new.html.twig', array(
            'temperatura' => $temperatura,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Temperatura entity.
     *
     * @Route("/{id}", name="temperatura_show")
     * @Method("GET")
     */
    public function showAction(Temperatura $temperatura)
    {
        $deleteForm = $this->createDeleteForm($temperatura);

        return $this->render('temperatura/show.html.twig', array(
            'temperatura' => $temperatura,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Temperatura entity.
     *
     * @Route("/{id}/edit", name="temperatura_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Temperatura $temperatura)
    {
        $deleteForm = $this->createDeleteForm($temperatura);
        $editForm = $this->createForm('Pedro\HouseBundle\Form\TemperaturaType', $temperatura);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($temperatura);
            $em->flush();

            return $this->redirectToRoute('temperatura_edit', array('id' => $temperatura->getId()));
        }

        return $this->render('temperatura/edit.html.twig', array(
            'temperatura' => $temperatura,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Temperatura entity.
     *
     * @Route("/{id}", name="temperatura_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Temperatura $temperatura)
    {
        $form = $this->createDeleteForm($temperatura);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($temperatura);
            $em->flush();
        }

        return $this->redirectToRoute('temperatura_index');
    }

    /**
     * Creates a form to delete a Temperatura entity.
     *
     * @param Temperatura $temperatura The Temperatura entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Temperatura $temperatura)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('temperatura_delete', array('id' => $temperatura->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
