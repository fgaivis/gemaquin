<ul>
	<li><?php echo $this->Html->link('Clientes', array('controller' => 'clients', 'action' => 'index', 'plugin' => 'business'))?></li>
	<li><?php echo $this->Html->link('Proveedores', array('controller' => 'providers', 'action' => 'index', 'plugin' => 'business'))?></li>
	<li><?php echo $this->Html->link('Contactos', array('controller' => 'contacts', 'action' => 'index', 'plugin' => 'business'))?></li>
	<li><?php echo $this->Html->link('Categorías', array('controller' => 'categories', 'action' => 'index', 'plugin' => 'categories'))?></li>
	<li><?php echo $this->Html->link('Items', array('controller' => 'items', 'action' => 'index', 'plugin' => 'catalog'))?></li>
	<li><?php echo $this->Html->link('Usuarios', array('controller' => 'users', 'action' => 'index', 'plugin' => 'users'))?></li>
</ul>