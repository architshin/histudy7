<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Smarty サンプル02: 関数</title>
</head>
<body>
<header>
	<h1>Histudy7 Smarty サンプル02: 関数</h1>
</header>
<section>
	<form action="sample02.php" method="post">
	注文合計が<input type="text" name="odTotalFloor" value="{$odTotalFloor}"/>円以上の注文情報を<input type="submit" value="表示"/>
	</form>
</section>
<section>
	{if $count == 0}
	<p>表示すべき情報はありません。</p>
	<?php }
	{else}
	{$count}件ありました。
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
		{foreach from=$orderEntities item="orderEntity"}
			<tr>
				<td>{$orderEntity->getOdCode()}</td>
				<td>{$orderEntity->getOdDate()|date_format:"%Y/%m/%d %H:%M:%S"}</td>
				<td>\{$orderEntity->getOdTotal()|number_format}</td>
				<td>{$orderEntity->getOdName()}</td>
				<td>{$orderEntity->getOdAddress()}</td>
				<td>{$orderEntity->getOdTel()}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>
	{/if}
</section>
</body>
</html>
