<?php
class SmartyView extends View {
	function __construct (&$controller) {
		parent::__construct($controller);
		if (is_object($controller)) {
			$count = count($this->_passedVars);
			for ($j = 0; $j < $count; $j++) {
				$var = $this->_passedVars[$j];
				$this->{$var} = $controller->{$var};
			}
			$this->_eventManager = $controller->getEventManager();
		}

		if(!App::import('Vendor', 'Smarty', array('file' => 'smarty'.DS.'Smarty.class.php')))
			die('error Loading Smarty Class');
		$this->Smarty = new Smarty();

		$this->subDir = '';

		$this->ext= '.tpl';
		$this->Smarty->plugins_dir[] = VENDORS.DS.'smarty'.DS.'plugins';
		$this->Smarty->compile_dir = TMP.'smarty'.DS.'compile'.DS;
		$this->Smarty->cache_dir = TMP.'smarty'.DS.'cache'.DS;
		$this->Smarty->error_reporting = 'E_ALL & ~E_NOTICE';
		$this->Smarty->debugging = false;
		$this->Smarty->compile_check = true;
		$this->viewVars['params'] = $this->params;

		$this->Helpers = new HelperCollection($this);
		$this->Blocks = new ViewBlock();
	}

	protected function _render($___viewFn, $___dataForView = array()) {
		$trace = debug_backtrace();
		$caller = array_shift($trace);
		if ($caller === "element") parent::_render($___viewFn, $___dataForView);

		if (empty($___dataForView)) {
			$___dataForView = $this->viewVars;
		}

		extract($___dataForView, EXTR_SKIP);

		foreach($___dataForView as $data => $value) {
			if(!is_object($data)) {
				$this->Smarty->assign($data, $value);
			}
		}
		$this->Smarty->assign('View', new View(null));
		$this->Smarty->assign('this', $this);
				
		ob_start();
		$this->Smarty->display($___viewFn);
		return ob_get_clean();
	}
}

?>
