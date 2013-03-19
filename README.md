KitpagesShopCmsBundle
=====================================

Installation
============
hum... as usual...

put the code in vendors/Kitpages/ShopCmsBundle

add vendors/ in the app/autoload.php

add the new Bundle in app/appKernel.php

You need to create a table in the database :
launch command:
php app/console doctrine:schema:update

Step:
Configuration example
=====================
kitpages_cms:
    block:
        template:
            template_list:
                product:
                    class: 'Kitpages\ShopCmsBundle\Form\Block\Product'
                    name: 'Standard'
                    twig: 'KitpagesShopCmsBundle:Block:form/product.html.twig'
        renderer:
            product:
                default:
                    type: 'twig'
                    twig: 'KitpagesShopCmsBundle:Block:renderer/product/default.html.twig'







