<?php
/**
 * Navigation module
 *
 * @category Ageme
 * @package Ageme_Navigation
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 25.07.14 15:04
 */
namespace Ageme\Navigation;

use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements AutoloaderProviderInterface {

	public function onBootstrap($e) {
		$e->getApplication()->getServiceManager()->get('translator');
		$eventManager = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
	}

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => str_replace('\\', '/', __DIR__ . '/src/' . __NAMESPACE__),
				),
			),
		);
	}
}