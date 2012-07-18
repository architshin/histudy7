<?php
class MemberController extends AppController {
	public $name = 'Member';
	public $uses = array('Member');
	
	function showList() {
		$memberList = $this->Member->find('all');
		$this->set('memberList', $memberList);
	}
}
?>