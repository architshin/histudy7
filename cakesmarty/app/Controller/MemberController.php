<?php
class MemberController extends AppController {
	public $name = 'Member';
	public $uses = array('Member');
	public $viewClass = 'Smarty';
	
	function showList() {
		$memberList = $this->Member->find('all');
		$this->set('memberList', $memberList);
		$this->set('memberListCount', count($memberList));
	}
}
?>