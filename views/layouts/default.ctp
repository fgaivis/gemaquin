<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author 		  Soluciones Dynamtek C.A. - FGG
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php //echo $this->Html->charset(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="es" />
<meta name="robots" content="all,follow" />
<meta name="author" lang="en" content="All: Soluciones Dynamtek [www.dynamtek.com]; e-mail: info@dynamtek.com;" />
<meta name="copyright" lang="en" content="Content: Representaciones IV Gemaquin C.A.; Development: Soluciones Dynamtek [www.dynamtek.com]; e-mail: info@dynamtek.com;" />
<meta name="description" content="Sistema Administrativo y Contable. SIAPHP" />
<meta name="keywords" content="Venezuela, Dynamtek, Soluciones, Factura, Pedido, Organizacion, Cliente, Proveedor, Venta, Compra, Farmacia, Industria, Importacion" />

	<title><?php echo __('Siaplus 2 - ').$title_for_layout; ?></title>
	
	<?php echo $this->Html->meta('icon'); ?>
	<?php 
		echo $this->Html->css('layout');
		//echo $this->Html->css('style'); 
	?>
	<!--[if lt IE 9]>
		<?php echo $this->Html->css('ie'); ?>
		<?php echo $this->Html->script('http://html5shim.googlecode.com/svn/trunk/html5.js'); ?>
	<![endif]-->
	<?php echo $this->Html->css('smoothness/jquery-ui.css'); ?>
</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><p style="margin: 0;" align="center"><a href="/"><?php echo $this->Html->image('sia2-logo_black.png', array())?></a></p></h1>
			<h2 class="section_title"><?php echo __('Representaciones IV Gemaquin - ').$title_for_layout; ?></h2>
			<div class="btn_view_site"><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout', 'plugin' => 'users'))?></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p><?php if (isset($username)) : echo $username; ?><?php endif; ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<!-- <article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article> -->
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input class="quick_search" type="text" value="<?php echo __('Buscar', true)?>" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3><?php echo __('Clientes', true); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo $this->Html->link(__('Nuevo cliente', true), array('controller' => 'clients', 'action' => 'add', 'plugin' => 'business', 'admin' => false))?></li>
			<li class="icn_categories"><?php echo $this->Html->link(__('Listar clientes', true), array('controller' => 'clients', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
			<!-- *** NO USADO / Ejemplo de icono Edit, Tag *** -->
			<!-- <li class="icn_edit_article"><a href="#">Edit Articles</a></li>
			<li class="icn_tags"><a href="#">Tags</a></li>  -->
		</ul>
		<h3><?php echo __('Proveedores', true); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo $this->Html->link(__('Nuevo proveedor', true), array('controller' => 'providers', 'action' => 'add', 'plugin' => 'business', 'admin' => false))?></li>
			<li class="icn_categories"><?php echo $this->Html->link(__('Listar proveedores', true), array('controller' => 'providers', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
		</ul>
		<h3><?php echo __('Contactos', true); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo $this->Html->link(__('Nuevo contacto', true), array('controller' => 'contacts', 'action' => 'add', 'plugin' => 'business', 'admin' => false))?></li>
			<li class="icn_categories"><?php echo $this->Html->link(__('Listar contactos', true), array('controller' => 'contacts', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
		</ul>
		<h3><?php echo __('Categorias', true); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo $this->Html->link(__('Nueva categoria', true), array('controller' => 'categories', 'action' => 'admin_add', 'plugin' => 'categories'))?></li>
			<li class="icn_categories"><?php echo $this->Html->link(__('Listar categorias', true), array('controller' => 'categories', 'action' => 'index', 'plugin' => 'categories'))?></li>
		</ul>
		<h3><?php echo __('Items', true); ?></h3>
		<ul class="toggle">
			<li class="icn_new_article"><?php echo $this->Html->link(__('Nuevo item', true), array('controller' => 'items', 'action' => 'add', 'plugin' => 'catalog', 'admin' => false))?></li>
			<li class="icn_categories"><?php echo $this->Html->link(__('Listar items', true), array('controller' => 'items', 'action' => 'index', 'plugin' => 'catalog', 'admin' => false))?></li>
		</ul>
		<h3><?php echo __('Usuarios', true); ?></h3>
		<ul class="toggle">
			<li class="icn_add_user"><?php echo $this->Html->link(__('Nuevo usuario', true), array('controller' => 'users', 'action' => 'admin_add', 'plugin' => 'users'))?></li>
			<li class="icn_view_users"><?php echo $this->Html->link(__('Listar usuarios', true), array('controller' => 'users', 'action' => 'index', 'plugin' => 'users'))?></li>
			<!-- <li class="icn_profile"><a href="#">Your Profile</a></li> -->
		</ul>
		<h3><?php echo __('Sistema', true); ?></h3>
		<ul class="toggle">
			<!-- <li class="icn_settings"><a href="#">Opciones</a></li>
			<li class="icn_security"><a href="#">Cambiar Password</a></li> -->
			<li class="icn_jump_back"><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout', 'plugin' => 'users'))?></li>
		</ul>
		<!-- *** NO USADO / Ejemplo de iconos interesantes *** -->
		<!-- <h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul> -->

		<footer>
			<hr />
			<p align="center"><a href="http://www.dynamtek.com"><?php echo $this->Html->image('dyn_small.png', array('class' => 'marg-small'))?></a></p>
			<p align="center"><strong>Copyright &copy; 2011 - Soluciones Dynamtek C.A. <br /> RIF.: J-29775955-7</strong></p>
		</footer>
	</aside><!-- end of sidebar -->

	<section id="main" class="column">
		<?php echo $this->Session->flash(); ?>
		<?php //echo $this->Session->flash('auth'); ?>
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

