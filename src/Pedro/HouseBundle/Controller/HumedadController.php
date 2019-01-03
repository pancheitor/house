<?php

namespace Pedro\HouseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pedro\HouseBundle\Entity\Humedad;
use Pedro\HouseBundle\Form\HumedadType;

/**
 * Humedad controller.
 *
 * @Route("/humedad")
 */
class HumedadController extends Controller
{
    /**
     * Lists all Humedad entities.
     *
     * @Route("/", name="humedad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $humedads = $em->getRepository('PedroHouseBundle:Humedad')->findAll();

        return $this->render('humedad/index.html.twig', array(
            'humedads' => $humedads,
        ));
    }

    /**
     * Creates a new Humedad entity.
     *
     * @Route("/new", name="humedad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $humedad = new Humedad();
        $form = $this->createForm('Pedro\HouseBundle\Form\HumedadType', $humedad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($humedad);
            $em->flush();

            return $this->redirectToRoute('humedad_show', array('id' => $humedad->getId()));
        }

        return $this->render('humedad/new.html.twig', array(
            'humedad' => $humedad,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Humedad entity.
     *
     * @Route("/{id}", name="humedad_show")
     * @Method("GET")
     */
    public function showAction(Humedad $humedad)
    {
        $deleteForm = $this->createDeleteForm($humedad);

        return $this->render('humedad/show.html.twig', array(
            'humedad' => $humedad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Humedad entity.
     *
     * @Route("/{id}/edit", name="humedad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Humedad $humedad)
    {
        $deleteForm = $this->createDeleteForm($humedad);
        $editForm = $this->createForm('Pedro\HouseBundle\Form\HumedadType', $humedad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($humedad);
            $em->flush();

            return $this->redirectToRoute('humedad_edit', array('id' => $humedad->getId()));
        }

        return $this->render('humedad/edit.html.twig', array(
            'humedad' => $humedad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Humedad entity.
     *
     * @Route("/{id}", name="humedad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Humedad $humedad)
    {
        $form = $this->createDeleteForm($humedad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($humedad);
            $em->flush();
        }

        return $this->redirectToRoute('humedad_index');
    }

    /**
     * Creates a form to delete a Humedad entity.
     *
     * @param Humedad $humedad The Humedad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Humedad $humedad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('humedad_delete', array('id' => $humedad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
