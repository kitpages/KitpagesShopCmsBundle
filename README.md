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






kitano_payment:
    service:
        payment_system: %payment.service%
    config:
        notification_url: "%base_url%/payment/payment-notification"
        internal_back_to_shop_url: "%base_url%/payment/back-to-shop"
        external_back_to_shop_url: "%base_url%/shop/back-to-shop"







