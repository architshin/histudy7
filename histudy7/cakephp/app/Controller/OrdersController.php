<?php
class OrdersController extends AppController {
	public $name = 'Orders';
	
	function showOneOrder($id) {
		$data = $this->Order->findByOd_code($id);
		$this->set('data', $data);
	}
}
?>