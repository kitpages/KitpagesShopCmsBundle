<?php
namespace Kitpages\ShopCmsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{

    public function __construct($categoryList)
    {
        foreach($categoryList as $category) {
            if ($category["subcategory_list"] != null) {
                foreach($category["subcategory_list"] as $subcategory) {
                    $this->categoryList[$category['category_name']][$category['category_name'].'-'.$subcategory]
                        = $subcategory;
                }
            } else {
                $this->categoryList[$category['category_name']] = $category['category_name'];
            }
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        $resolver->setDefaults(array(
            'choices' => $this->categoryList
        ));
    }

    public function getParent()
    {
        return 'choice';
    }

    public function getName() {
        return 'category';
    }


}
