<?php
namespace Kitpages\ShopCmsBundle\Form\Block;

use Kitpages\ShopCmsBundle\Form\Type\CategoryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Min;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\ChoiceValidator;

class Product extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add(
            'name',
            'text',
            array(
                'label' => 'Name',
                'required' => false,
                'attr' => array(
                    "size" => "50"
                )
            )
        );

//        $builder->add(
//            'category',
//            'text',
//            array(
//                'label' => 'Category',
//                'required' => false,
//                'attr' => array(
//                    "size" => "50"
//                )
//            )
//        );

        $builder->add(
            'category',
            'category',
            array(
                'label' => 'Category',
                'required' => false,
//                'choice_list'   => array(
//                    'Vêtement garçon-3 mois' => 'Left',
//                    'right' => 'Right',
//                    'top' => 'Top',
//                    'center' => 'Centered',
//                    'bottom' => 'Bottom',
//                    'hidden' => 'Hidden'
//                ),
            )
        );

        $builder->add(
            'price',
            'text',
            array(
                'label' => 'Price',
                'required' => true,
                'attr' => array(
                    "size" => "50",
                ),
                'constraints' => new Min(array('limit' => 0))
            )
        );

        $builder->add(
            'description',
            'textarea',
            array(
                'label' => 'Description',
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-advanced"
                )
            )
        );
        $builder->add('media_mainImage', 'hidden');

        $builder->add(
            'imagePosition',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'left' => 'Left',
                    'right' => 'Right',
                    'top' => 'Top',
                    'center' => 'Centered',
                    'bottom' => 'Bottom',
                    'hidden' => 'Hidden'
                ),
                'label' => 'Image position'
            )
        );
        $builder->add(
            'titleAboveFloat',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'YES' => 'Above',
                    'NO' => 'Left or right the image'
                ),
                'label' => 'Title position for images left or right',
                'attr' => array(
                    "class" => "kit-cms-advanced"
                )
            )
        );
        $builder->add(
            'image_url',
            'text',
            array(
                'required' => false,
                'label' => 'Url of the image',
                'attr' => array(
                    "size" => "50"
                )
            )
        );

        $builder->add(
            'subContent',
            'textarea',
            array(
                'required' => false,
                'attr' => array(
                    "class" => "kit-cms-rte-advanced"
                )
            )
        );

        $builder->add(
            'block_presentation',
            'choice',
            array(
                'required' => false,
                'choices'   => array(
                    'app-block-style-black' => 'Black'
                ),
                'label' => 'Alternative block presentation'
            )
        );

        $builder->add(
            'displaySeparator',
            'checkbox',
            array(
                'required' => false,
                'value' => 'YES',
                'label' => 'Display separation bar ?',
                'attr' => array(
                    "class" => "kit-cms-rte-simple"
                )
            )
        );

    }

    public function getName() {
        return 'Standard';
    }

    public function filterList() {
        return array(
            'description' => 'stripTagText',
            'subContent' => 'stripTagText',
        );
    }


}
