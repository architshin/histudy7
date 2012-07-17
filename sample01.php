<?php
print("<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n");
$odTotalFloor = $_POST['odTotalFloor'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>サンプル01: MVC未分離</title>
</head>
<body>
<h1>Histudy7 サンプル01: MVC未分離</h1>
<hr/>
<form action="sample01.php" method="post">
注文合計が<input type="text" name="odTotalFloor" value="<?php print($odTotalFloor) ?>"/>円以上の注文情報を<input type="submit" value="表示"/>
</form>
<?php
if(is_numeric($odTotalFloor)) {
	$dsn = "mysql:host=localhost;dbname=histudy7";
	$username = "histudy";
	$password = "hihi";
	
	try {
		$db = new PDO($dsn, $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->query("SET NAMES utf8;");
		$sql1 = "SELECT COUNT(DISTINCT(od_code)) AS count FROM orders WHERE od_total>=:od_total ORDER BY od_total";
		$stmt1 = $db->prepare($sql1);
		
		$stmt1->bindParam(":od_total", $odTotalFloor);
		$stmt1->execute();
		$result1 = $stmt1->fetch();
		
		$count = $result1["count"];
		if($count == 0) {
?>
<p>表示すべき情報はありません。</p>
<?php
		}
		else {
?>
<p><?php print($count) ?>件ありました。</p>
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
<?php
			$sql2 = "SELECT * FROM orders WHERE od_total>=:od_total ORDER BY od_total";
			$stmt2 = $db->prepare($sql2);
			$stmt2->bindParam(":od_total", $odTotalFloor);
			$stmt2->execute();
			$i = 0;
			while($row = $stmt2->fetch()) {
?>
		<tr>
			<td><?php print($row['od_code']) ?></td>
			<td><?php print(strftime('%Y/%m/%d %H:%M:%S',strtotime($row['od_date']))) ?></td>
			<td><?php print($row['od_total']) ?></td>
			<td><?php print($row['od_name']) ?></td>
			<td><?php print($row['od_address']) ?></td>
			<td><?php print($row['od_tel']) ?></td>
		</tr>
<?php
			}
?>
	</tbody>
</table>
<?php
		}
		$db = null;
	}
	catch(PDOException $ex) {
		$expMessage = "<p>DB接続に失敗しました。<hr/>";
		$expMessage .= "例外の中身:Code=".$ex->getCode()."<br/>".$ex->getFile()."(".$ex->getLine()."): ".$ex->getMessage()."<br/>".$ex->getTraceAsString();
		print($expMessage);
	}
}
?>
</body>
</html>