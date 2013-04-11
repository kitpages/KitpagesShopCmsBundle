<?php

namespace Kitpages\ShopCmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Kitpages\CmsBundle\Controller\Context;
use Kitpages\ShopCmsBundle\Model\Product;

/**
 * Product controller.
 *
 */
class ProductController extends Controller
{

    public function addToCartAction($blockId)
    {

        $em = $this->getDoctrine()->getManager();
        $block = $em->getRepository("KitpagesCmsBundle:Block")->find($blockId);

        if ($block->getTemplate() != 'product') {
            return $this->redirect($this->generateUrl("KitpagesShopCmsBundle_shop_cart"));
        }
        $this->get('kitpages.cms.manager.file');
        $cartManager = $this->get('kitpages_shop.cartManager');
        $cart = $cartManager->getCart();

        //use for the beat is also serialized

        $cart->addLine(new Product($block));
        return $this->redirect($this->generateUrl("KitpagesShopBundle_cart_display"));

    }

}