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

    public function productDetailAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $pageRepository = $em->getRepository('KitpagesCmsBundle:Page');
        $pageForNav = $pageRepository->findOneBySlug('product-link');

        $kitCmsPageData = array(
            "root" => array(
                "metaTitle" => "",
                "metaDescription" => "",
            )
        );

        // get title
        $blockRepository = $em->getRepository('KitpagesCmsBundle:BlockPublish');
        $blockPublish = $blockRepository->findBySlugAndRenderer($slug, "detail");
        if ($blockPublish instanceof BlockPublish) {
            $dataPub = $blockPublish->getData();
            $kitCmsPageData = array(
                "root" => array(
                    "metaTitle" => "Product - ".strip_tags($dataPub["root"]["title"]),
                    "metaDescription" => "Product - ".strip_tags($dataPub["root"]["shortContent"])
                )
            );
        }


        return $this->render(
            'KitpagesShopCmsBundle:Product:product-detail.html.twig',
            array(
                'kitCmsPage' => $pageForNav,
                'kitCmsPageData' => $kitCmsPageData,
                'slug' => $slug,
            )
        );
    }

}