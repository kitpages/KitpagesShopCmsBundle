<?php

namespace Kitpages\ShopCmsBundle\Model;

use Kitpages\ShopBundle\Model\Cart\ProductInterface;
use Kitpages\CmsBundle\Entity\Block;
/**
 * App\CatalogBundle\Entity\Beat
 */
class Product
    implements ProductInterface
{

    public function __construct(Block $block)
    {
        $this->block = $block;
        $data = $block->getData();
        $this->data = $data['root'];
    }

    ////
    // shop methods
    ////
    public function getShopReference()
    {
        return $this->block->getId();
    }
    public function getShopUnitPrice()
    {
        return $this->data['price'];
    }
    public function getShopUnitVat($countryCode)
    {
        if (!in_array($countryCode, array(
            "FR", "DE", "AT", "BE", "BG", "DK", "ES", 'FI', 'GR', 'IE', 'IT', 'LU', 'NL', 'PT', 'GB', 'UK', 'SE', 'CY', 'EE', 'HU', 'LV', 'LT', 'MT', 'PL', 'SK', 'CZ', 'RO', 'SI'
        ))) {
            return 0;
        }
        return round( $this->getShopUnitPrice() * (1 - (1/1.196) ), 2 );

    }
    public function getShopWeight()
    {
        return 0;
    }
    public function getShopName()
    {
        return $this->data['name'];
    }
    public function getShopDescription()
    {
        return $this->data['description'];
    }
    public function getShopData()
    {
        return array(
        );
    }

    public function getShopCategory()
    {
        return $this->data['category'];
    }

}