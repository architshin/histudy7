<?php
require_once("OrderEntity.class.php");
require_once("OrderDAO.class.php");

$odCode = $_GET['odCode'];

$orderDAO = new OrderDAO();
$orderEntity = $orderDAO->findyByPK($odCode);

$htmlTemp = file_get_contents("sample03t.html");
$html = str_replace("#OD_CODE#", $orderEntity->getOdCode(), $htmlTemp);
$html = str_replace("#OD_DATE#", strftime('%Y/%m/%d %H:%M:%S',strtotime($orderEntity->getOdDate())), $html);
$html = str_replace("#OD_TOTAL#", number_format($orderEntity->getOdTotal()), $html);
$html = str_replace("#OD_NAME#", $orderEntity->getOdName(), $html);
$html = str_replace("#OD_ADDRESS#", $orderEntity->getOdAddress(), $html);
$html = str_replace("#OD_TEL#", $orderEntity->getOdTel(), $html);

print($html);
?>
