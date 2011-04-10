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
		<?php __('Siaplus 2 - Representaciones IV Gemaquin C.A.'); ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('main');
		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="ent-name">
        	<span>Representaciones IV Gemaquin C.A.</span>
        </div>
		<div id="login-box">
        	<div class="sia-info">
            	<?php echo $this->Html->image('sia2-logo.png', array('class' => 'marg-big'))?>
                
				<a href="http://www.dynamtek.com"><?php echo $this->Html->image('dyn_small.png', array('class' => 'marg-small'))?></a>
                <br />
                <span>&copy; Copyright 2011 - Soluciones Dynamtek C.A. <br /> RIF.: J-29775955-7</span>
            </div>
            <div class="login-fields">
            	<?php echo $this->Session->flash(); ?>

				<?php echo $content_for_layout; ?>
            </div>
            <div style="clear:both"></div>
        </div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
