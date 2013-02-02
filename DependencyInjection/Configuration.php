<?php

/*
 * This file is part of the CCDNUser UserBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNUser\UserBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class Configuration implements ConfigurationInterface
{
	
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_user_user');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('user')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('profile_route')->defaultValue('ccdn_user_profile_show_by_id')->end()
                    ->end()
                ->end()
                ->arrayNode('template')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('engine')->defaultValue('twig')->end()
                    ->end()
                ->end()
            ->end();

        $this->addAccountSection($rootNode);
        $this->addChangePasswordSection($rootNode);
        $this->addRegistrationSection($rootNode);
        $this->addResettingSection($rootNode);
        $this->addSecuritySection($rootNode);
        $this->addSidebarSection($rootNode);
        $this->addLegalSection($rootNode);

        return $treeBuilder;
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addAccountSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('account')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('show')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('edit')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addChangePasswordSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('password')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('change_password')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addRegistrationSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('registration')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('register')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('check_email')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('confirmed')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addResettingSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('resetting')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('request')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('password_already_requested')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('check_email')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                            ->end()
                        ->end()
                        ->arrayNode('reset')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('form_theme')->defaultValue('CCDNUserUserBundle:Form:fields.html.twig')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addSecuritySection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('security')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('login')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_right.html.twig')->end()
                                ->scalarNode('support_facebook')->defaultValue(false)->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }

    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addSidebarSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('sidebar')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('members_route')->defaultValue('ccdn_user_member_index')->end()
                        ->scalarNode('profile_route')->defaultValue('ccdn_user_profile_show')->end()
                    ->end()
                ->end()
            ->end();
    }

	
    /**
     *
     * @access private
     * @param ArrayNodeDefinition $node
     */
    private function addLegalSection(ArrayNodeDefinition $node)
    {
        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('legal_documents')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('terms_conditions')->defaultValue('CCDNUserUserBundle:Legal:terms_conditions.txt.twig')->end()
                        ->scalarNode('copyright_notice')->defaultValue('CCDNUserUserBundle:Legal:copyright_notice.txt.twig')->end()
                        ->scalarNode('privacy_policy')->defaultValue('CCDNUserUserBundle:Legal:privacy_policy.txt.twig')->end()
                        ->scalarNode('disclaimer')->defaultValue('CCDNUserUserBundle:Legal:disclaimer.txt.twig')->end()
					->end()
				->end()
				->arrayNode('legal_identification')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
					->children()
						->scalarNode('company_name')->defaultValue('')->end()
						->scalarNode('show_company_name')->defaultValue(false)->end()

						->scalarNode('company_address')->defaultValue('')->end()
						->scalarNode('show_company_address')->defaultValue(false)->end()

						->scalarNode('company_registered_number')->defaultValue('')->end()
						->scalarNode('show_company_registered_number')->defaultValue(false)->end()

						->scalarNode('company_registered_house')->defaultValue('')->end()
						->scalarNode('show_company_registered_house')->defaultValue(false)->end()

						->scalarNode('copyright_year')->defaultValue('')->end()
						->scalarNode('show_copyright_year')->defaultValue(false)->end()
                    ->end()
                ->end()
            ->end();
    }

}
