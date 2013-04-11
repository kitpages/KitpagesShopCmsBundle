<?php

namespace Kitpages\ShopCmsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kitpages_shop_cms');

        $this->addGeneralSection($rootNode);

        return $treeBuilder;
    }

    /**
     * Parses the kitpages_cms others sections
     * Example for yaml driver:
     * kitpages_shop:
     *     target_parameter: 'cms_target'
     *
     * @param ArrayNodeDefinition $node
     * @return void
     */
    private function addGeneralSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('category_list')
                    ->useAttributeAsKey('category')
                        ->prototype('array')
                        ->children()
                            ->scalarNode('category_name')
                                ->cannotBeEmpty()
                            ->end()
                            ->arrayNode('subcategory_list')
                                ->prototype('scalar')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()


            ->end();
    }

}
