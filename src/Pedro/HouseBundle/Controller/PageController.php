<?php

namespace Pedro\HouseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('PedroHouseBundle:Page:index.html.twig');
    }
}
