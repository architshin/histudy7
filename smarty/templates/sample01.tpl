<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Smarty サンプル01: テンプレート変数</title>
</head>
<body>
<header>
	<h1>Histudy7 Smarty サンプル01: テンプレート変数</h1>
</header>
<section>
	<table border="1">
		<tr>
			<th>注文コード</th>
			<td>{$odCode}</td>
		</tr>
		<tr>
			<th>注文日時</th>
			<td>{$odDate|date_format:"%Y/%m/%d %H:%M:%S"}</td>
		</tr>
		<tr>
			<th>注文合計金額</th>
			<td>{$odTotal}円</td>
		</tr>
		<tr>
			<th>注文者氏名</th>
			<td>{$odName}</td>
		</tr>
		<tr>
			<th>注文者住所</th>
			<td>{$odAddress}</td>
		</tr>
		<tr>
			<th>注文者電話番号</th>
			<td>{$odTel}</td>
		</tr>
	</table>
</section>
</body>
</html>
