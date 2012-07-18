<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	{$this->Html->charset()}
	<title>
		{$cakeDescription}:
		{$title_for_layout}
	</title>
	{$this->Html->meta('icon')}
	{$this->Html->css('cake.generic')}
	{$this->fetch('meta')}
	{$this->fetch('css')}
	{$this->fetch('script')}
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>{$this->Html->link($cakeDescription, 'http://cakephp.org')}</h1>
		</div>
		<div id="content">

			{$this->Session->flash()}

			{$this->fetch('content')}
		</div>
		<div id="footer">
			<a href="http://www.cakephp.org/" target="_blank">{$this->Html->image('cake.power.gif')}</a>
		</div>
	</div>
	{$View->element('sql_dump')}
</body>
</html>
