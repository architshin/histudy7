<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CakePHP Sample02</title>
</head>
<body>
<header>
	<h1>CakePHP Sample02</h1>
</header>
<section>
<?php if(empty($memberList)) { ?>
<p>表示すべき情報はありません。</p>
<?php }
else { ?>
<?php print(count($memberList)) ?>件ありました。
<table border="1">
	<thead>
		<tr>
			<th>会員コード</th>
			<th>会員名</th>
			<th>メールアドレス</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($memberList as $key=>$member) { ?>
		<tr>
			<td><?php print($member['Member']['id']) ?></td>
			<td><?php print($member['Member']['mb_name_last']." ".$member['Member']['mb_name_first']) ?></td>
			<td><?php print($member['Member']['mb_mail']) ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>
</section>
</body>
</html>
