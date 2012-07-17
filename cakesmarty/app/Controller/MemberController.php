<?php
class MemberController extends AppController {
	public $name = 'Member';
//	public $helpers = array('Html');
	public $viewClass = 'Smarty';
	
	function index() {
		$data = $this->Member->findById(1);
		$this->set('data', $data);
	}
}
?>