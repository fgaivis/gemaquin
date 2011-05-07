<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title><?php echo $title_for_layout; ?></title>
	<?php echo $this->Html->css('layout'); ?>
	<!--[if lt IE 9]>
		<?php echo $this->Html->css('ie'); ?>
		<?php echo $this->Html->script('http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>
	<![endif]-->
	<?php echo $this->Html->css('smoothness/jquery-ui.css'); ?>
</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="/">Gemaquin</a></h1>
			<h2 class="section_title">Dashboard</h2>
			<div class="btn_view_site"><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout'))?></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">New Article</a></li>
			<li class="icn_edit_article"><a href="#">Edit Articles</a></li>
			<li class="icn_categories"><a href="#">Categories</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>
		</ul>
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Add New User</a></li>
			<li class="icn_view_users"><a href="#">View Users</a></li>
			<li class="icn_profile"><a href="#">Your Profile</a></li>
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>
		</ul>

		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->

	<section id="main" class="column">

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $content_for_layout; ?>
		<div class="spacer"></div>
	</section>
	<?php echo $this->Html->script('jquery.min'); ?>
	<?php echo $this->Html->script('jquery-ui.min'); ?>
	<?php echo $this->Html->script('hideshow'); ?>
	<?php echo $this->Html->script('jquery.tablesorter.min'); ?>
	<?php echo $this->Html->script('jquery.equalHeight'); ?>
	<?php echo $this->Html->scriptBlock('App = {};App.basePath = "' . $this->Html->url('/') . '";App.baseUrl = "' . $this->Html->url('/', true) . '";'); ?>
	<?php echo $scripts_for_layout; ?>
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>

