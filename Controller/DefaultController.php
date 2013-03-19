<?php

namespace Kitpages\ShopCmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KitpagesShopCmsBundle:Default:index.html.twig', array('name' => $name));
    }
}
