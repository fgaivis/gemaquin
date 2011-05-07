<div class="home">
<header><h3>Bienvenido a su sistema SiaPlus2</h3></header>

<div class="home-info">
	<p>Sistema administrativo basado en tecnología web, que busca optimizar los procesos administrativos de las empresas ajustándose 
	a las necesidades particulares. Orientado a empresas que tengan varios centros administrativos, permitiendo el manejo a tiempo 
	real de todas las operaciones de la empresa sin importar su ubicación geográfica. Cumple con lo requerido por un sistema 
	administrativo confiable más la flexibilidad y movilidad que ofrece el software como servicio.</p>
</div>

<div class="home-menu">
	<ul>
		<li><?php echo $this->Html->link('Clientes', array('controller' => 'clients', 'action' => 'index', 'plugin' => 'business'))?></li>
		<li><?php echo $this->Html->link('Proveedores', array('controller' => 'providers', 'action' => 'index', 'plugin' => 'business'))?></li>
		<li><?php echo $this->Html->link('Contactos', array('controller' => 'contacts', 'action' => 'index', 'plugin' => 'business'))?></li>
		<li><?php echo $this->Html->link('Categorías', array('controller' => 'categories', 'action' => 'index', 'plugin' => 'categories'))?></li>
		<li><?php echo $this->Html->link('Items', array('controller' => 'items', 'action' => 'index', 'plugin' => 'catalog'))?></li>
		<li><?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index', 'plugin' => 'users'))?></li>
	</ul>
</div>

<div style="clear: both"></div>
</div>