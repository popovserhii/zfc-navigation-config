<?php
namespace Ageme\Navigation;

return [

	'controller_plugins' => [
		'invokables' => [
			'paginator' => 'Ageme\Navigation\Controller\Plugin\Paginator',
		],
	],

	'controller_plugin_config' => [
		'paginator' => [
			'pageUrlKey' => 'page',
			'pageRange' => '10',
			'itemCountPerPage' => '25',
		],
	],


	'view_helpers' => [
		//'invokables' => [],
		//'factories' => []
	],

	'navigation_helpers' => [
		'factories' => [
			'menu' 		=> 'Ageme\Navigation\View\Helper\Factory\NavigationHelperFactory',
			//'breadcrumbs' => 'Ageme\Navigation\View\Helper\Factory\NavigationHelperFactory',
			//'links'       => 'Ageme\Navigation\View\Helper\Factory\NavigationHelperFactory',
			//'sitemap'     => 'Ageme\Navigation\View\Helper\Factory\NavigationHelperFactory',
		]
	],

	'navigation_helper_config' => [
		'menu' => [
			'ulClass' => 'sidebar-menu',
			'addClassToListItem' => true,
			'liActiveClass' => 'active',
			'escapeLabels' => false,
		],
		//'breadcrumbs' => [],
		//'links'       => [],
		//'sitemap'     => [],
	],


	'service_manager' => [
		'factories' => [
			'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
		],
	],

	'view_manager' => [
		'template_map' => [
			'navigation/menu'	=> __DIR__ . '/../view/default/menu.phtml',
			'pagination/control'	=> __DIR__ . '/../view/default/pagination.phtml',
		],
		'template_path_stack' => [
			__DIR__ . '/../view',
		],
	],

	'translator' => [
		'locale' => 'en_GB',
		'translation_file_patterns' => [
			[
				'type'     => 'gettext',
				'base_dir' => __DIR__ . '/../language',
				'pattern'  => '%s.mo',
				'text_domain' => __NAMESPACE__,
			],
		],
	],


	// @link http://adam.lundrigan.ca/2012/07/quick-and-dirty-zf2-zend-navigation/
	// All navigation-related configuration is collected in the 'navigation' key
	'navigation' => array(
		'default' => array(
			array(
				'label' => 'Home',
				'route' => 'home',
				'icon' => 'glyphicon glyphicon-home',
			),
		),
	),

];