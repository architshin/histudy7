<?php
require_once("libs/Smarty.class.php");
require_once("OrderEntity.class.php");
require_once("OrderDAO.class.php");

$oSmarty = new Smarty();
$oSmarty->template_dir = "./templates/";
$oSmarty->compile_dir = "./templates_c";

$orderEntities = array();
$odTotalFloor = $_POST['odTotalFloor'];
if(is_numeric($odTotalFloor)) {
	$orderDAO = new OrderDAO();
	$orderEntities = $orderDAO->findMoreThanOdTotalFloor($odTotalFloor);
}

$oSmarty->assign("count", count($orderEntities));
$oSmarty->assign("orderEntities", $orderEntities);
$oSmarty->display("sample02.tpl");
?>
