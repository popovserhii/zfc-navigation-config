<?php
/**
 * Pagination plugin
 *
 * @category Ageme
 * @package Ageme_Pagination
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 05.02.15 0:17
 */

namespace Ageme\Navigation\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Paginator\Paginator as ZendPaginator;
use DoctrineMongoODMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;

class Paginator extends AbstractPlugin {

	use \Ageme\Navigation\Service\SetterAwareTrait;

	/**
	 * @param \Iterator $cursor
	 * @param null|int $page
	 * @return ZendPaginator $paginator
	 */
	protected function run(\Iterator $cursor, $page = null) {
		$config = $this->getController()->getServiceLocator()->get('Config');
		$adapter = new DoctrineAdapter($cursor);
		$paginator = new ZendPaginator($adapter);

		if (isset($config['controller_plugin_config']['paginator'])) {
			$pluginConfig = $config['controller_plugin_config']['paginator'];
			$pluginConfig['currentPageNumber'] = $page ?: $this->getController()->getEvent()->getRouteMatch()->getParam($pluginConfig['pageUrlKey'], 1);
			unset($pluginConfig['pageUrlKey']);
			$this->setParameters($pluginConfig, $paginator);
		}

		return $paginator;
	}

	public function __invoke(\Iterator $cursor, $page = null) {
		return $this->run($cursor, $page);
	}

}