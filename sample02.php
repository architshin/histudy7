<?php
require_once("OrderEntity.class.php");
require_once("OrderDAO.class.php");


$orderEntities = array();
$odTotalFloor = $_POST['odTotalFloor'];
if(is_numeric($odTotalFloor)) {
	$orderDAO = new OrderDAO();
	$orderEntities = $orderDAO->findMoreThanOdTotalFloor($odTotalFloor);
}
$count = count($orderEntities);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>サンプル02: Mの分離</title>
</head>
<body>
<header>
	<h1>Histudy7 サンプル02: Mの分離</h1>
</header>
<section>
	<form action="sample02.php" method="post">
	注文合計が<input type="text" name="odTotalFloor" value="<?php print($odTotalFloor) ?>"/>円以上の注文情報を<input type="submit" value="表示"/>
	</form>
</section>
<section>
<?php if($count == 0) { ?>
<p>表示すべき情報はありません。</p>
<?php }
else { ?>
<?php print($count) ?>件ありました。
<table border="1">
	<thead>
	<tr>
		<th>注文コード</th>
		<th>注文日時</th>
		<th>注文合計金額</th>
		<th>注文者氏名</th>
		<th>注文者住所</th>
		<th>注文者電話番号</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($orderEntities as $key1=>$orderEntity) { ?>
		<tr>
			<td><?php print($orderEntity->getOdCode()) ?></td>
			<td><?php print(strftime('%Y/%m/%d %H:%M:%S',strtotime($orderEntity->getOdDate()))) ?></td>
			<td><?php print($orderEntity->getOdTotal()) ?></td>
			<td><?php print($orderEntity->getOdName()) ?></td>
			<td><?php print($orderEntity->getOdAddress()) ?></td>
			<td><?php print($orderEntity->getOdTel()) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
</section>
</body>
</html>