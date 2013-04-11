<?php
namespace Kitpages\ShopCmsBundle\Twig\Extension;

class ShopCmsExtension extends \Twig_Extension
{

    public function __construct($categoryList)
    {
        $this->categoryList = $categoryList;
    }


    public function getCategoryList()
    {
        foreach($this->categoryList as $category) {
            if ($category["subcategory_list"] != null) {
                foreach($category["subcategory_list"] as $subcategory) {
                    $twigCategoryList[$category['category_name']][] = array(
                        'value' => $category['category_name'].'-'.$subcategory,
                        'label' => $subcategory
                    );
                }
            } else {
                $twigCategoryList[] = array(
                    'value' => $category['category_name'],
                    'label' => $category['category_name']
                );
            }
        }

        return $twigCategoryList;
    }

    public function getFunctions()
    {
        return array(
            'kit_shop_cms_category_list' => new \Twig_Function_Method($this, 'getCategoryList'),
        );
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {
        return array(
            '' => new \Twig_Filter_Function('Kitpages\ShopCmsBundle\Twig\Extension\ShopCmsExtension::categoryList'),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'kit_shop_cms';
    }
}
