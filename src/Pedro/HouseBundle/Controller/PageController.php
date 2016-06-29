<?php

namespace Pedro\HouseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('PedroHouseBundle:Page:index.html.twig');
    }
    public function huertoAction()
    {
        return $this->render('PedroHouseBundle:Page:huerto.html.twig');
    }
    public function casaAction()
    {
        return $this->render('PedroHouseBundle:Page:casa.html.twig');
    }
    public function aguasAction()
    {
        return $this->render('PedroHouseBundle:Page:aguas.html.twig');
    }
    public function energiaAction()
    {
        return $this->render('PedroHouseBundle:Page:energia.html.twig');
    }
    public function configuracionAction()
    {
        return $this->render('PedroHouseBundle:Page:configuracion.html.twig');
    }

    
}
