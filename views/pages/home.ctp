<div class="home">
<header><h3>Bienvenido a su sistema SiaPlus 2 - Representaciones IV Gemaquin C.A.</h3></header>

<div class="home-info">
	<p>Sistema administrativo basado en tecnología web, que busca optimizar los procesos administrativos de las empresas ajustándose 
	a las necesidades particulares. Orientado a empresas que tengan varios centros administrativos, permitiendo el manejo a tiempo 
	real de todas las operaciones de la empresa sin importar su ubicación geográfica. Cumple con lo requerido por un sistema 
	administrativo confiable más la flexibilidad y movilidad que ofrece el software como servicio.</p>
</div>

<div class="home-menu">
	<ul>
		<li><?php echo $this->Html->link(__('Clientes', true), array('controller' => 'clients', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Proveedores', true), array('controller' => 'providers', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Contactos', true), array('controller' => 'contacts', 'action' => 'index', 'plugin' => 'business', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Categorías', true), array('controller' => 'categories', 'action' => 'index', 'plugin' => 'categories'))?></li>
		<li><?php echo $this->Html->link(__('Items', true), array('controller' => 'items', 'action' => 'index', 'plugin' => 'catalog', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Inventario', true), array('controller' => 'inventory', 'action' => 'stock', 'plugin' => 'inventory', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Ordenes de Compra', true), array('controller' => 'purchase_orders', 'action' => 'index', 'plugin' => 'orders', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Ordenes de Venta', true), array('controller' => 'sales_orders', 'action' => 'index', 'plugin' => 'orders', 'admin' => false))?></li>
		<li><?php echo $this->Html->link(__('Usuarios', true), array('controller' => 'users', 'action' => 'index', 'plugin' => 'users'))?></li>
	</ul>
</div>

<div style="clear: both"></div>
</div>