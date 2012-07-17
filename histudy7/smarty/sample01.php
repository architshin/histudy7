<?php
require_once("libs/Smarty.class.php");
require_once("OrderEntity.class.php");
require_once("OrderDAO.class.php");

$oSmarty = new Smarty();
$oSmarty->template_dir = "./templates/";
$oSmarty->compile_dir = "./templates_c";

$odCode = $_GET['odCode'];

$orderDAO = new OrderDAO();
$orderEntity = $orderDAO->findyByPK($odCode);

$oSmarty->assign("odCode", $orderEntity->getOdCode());
$oSmarty->assign("odDate", $orderEntity->getOdDate());
$oSmarty->assign("odTotal", number_format($orderEntity->getOdTotal()));
$oSmarty->assign("odName", $orderEntity->getOdName());
$oSmarty->assign("odAddress", $orderEntity->getOdAddress());
$oSmarty->assign("odTel", $orderEntity->getOdTel());

$oSmarty->display("sample01.tpl");
?>
