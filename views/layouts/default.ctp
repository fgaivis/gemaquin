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

	<title>
		<?php __('Siaplus 2 - Representaciones IV Gemaquin C.A. -'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('base');
		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
        <div id="header-wrap">
            <div id="header">
            	<div id="top-header">
            		<div id="logo"><?php echo $this->Html->image('sia2-logo.png', array('class' => 'marg-big'))?></div>
            		<div id="sys-info">
            			<div id="top-info">
            				<div class="enterprise">Representaciones IV Gemaquin C.A.</div>
            				<div class="session">
								<?php echo $this->Html->link('Inicio','/', array('class' => 'start'))?>
								<?php echo $this->Html->link('Salir', array('controller' => 'users', 'action' => 'logout', 'plugin' => 'users'), array('class' => 'logout'))?>
							</div>	
            			</div>
            			<div id="bottom-info">
            				<div class="user">Bienvenido Francisco Gaivis, ultima sesi&oacute;n iniciada el: 05/04/2011</div>
            				<div></div>
            			</div>
            		</div>
            		<div style="clear: both;"></div>
                </div>
                <div id="menu">
                	<?php echo $this->element('menu'); ?>
                </div>
            </div>
        </div>	
    	<div id="content">
        	<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>
        </div>
        
        <div id="footer-wrap">
        	<div id="footer">
        		<span>&copy; Copyright 2011 - Desarrollado por Soluciones Dynamtek C.A.</span>
        		<a href="http://www.dynamtek.com"><?php echo $this->Html->image('dyn_small.png', array('class' => 'marg-small'))?></a>
        	</div>
        </div>
    </div> 
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
