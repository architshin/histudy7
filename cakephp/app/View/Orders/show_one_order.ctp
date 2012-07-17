<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CakePHP Sample01</title>
</head>
<body>
<header>
	<h1>CakePHP Sample01</h1>
</header>
<section>
	<table border="1">
		<tr>
			<th>注文コード</th>
			<td><?php print($data['Order']['od_code'])?></td>
		</tr>
		<tr>
			<th>注文日時</th>
			<td><?php print(strftime('%Y/%m/%d %H:%M:%S',strtotime($data['Order']['od_date'])))?></td>
		</tr>
		<tr>
			<th>注文合計金額</th>
			<td><?php print(number_format($data['Order']['od_total']))?>円</td>
		</tr>
		<tr>
			<th>注文者氏名</th>
			<td><?php print($data['Order']['od_name'])?></td>
		</tr>
		<tr>
			<th>注文者住所</th>
			<td><?php print($data['Order']['od_address'])?></td>
		</tr>
		<tr>
			<th>注文者電話番号</th>
			<td><?php print($data['Order']['od_tel'])?></td>
		</tr>
	</table>
</section>
</body>
</html>
