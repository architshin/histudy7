<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>CakePHP+Smarty Sample</title>
</head>
<body>
<header>
	<h1>CakePHP+Smarty Sample</h1>
</header>
<section>
{if empty($memberList) }
<p>表示すべき情報はありません。</p>
{else}
{$memberListCount}件ありました。
<table border="1">
	<thead>
		<tr>
			<th>会員コード</th>
			<th>会員名</th>
			<th>メールアドレス</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$memberList item="member"}
		<tr>
			<td>{$member.Member.id}</td>
			<td>{$member.Member.mb_name_last}&nbsp;{$member.Member.mb_name_first}</td>
			<td>{$member.Member.mb_mail}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{/if}
</section>
</body>
</html>
