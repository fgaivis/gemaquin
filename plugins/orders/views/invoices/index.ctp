<div class="invoices index">
<header><h3><?php __('Invoices');?></h3></header>

	<div class="index-filters">
    <?php

    if (!$isReport) {
        echo $this->Form->create(null, array(
            'url' => array_merge(array('action' => 'index'), $this->params['pass'])
        ));
        echo $this->Form->input('from_date', array('div' => false, 'label' => __('From', true)));
        echo $this->Form->input('to_date', array('div' => false, 'label' => __('To', true)));
        echo $this->Form->submit(__('Search', true), array('div' => false));
        echo $this->Form->end();
    }


    ?>
    </div>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('organization_id');?></th>
	<th><?php echo $this->Paginator->sort('number');?></th>
	<th><?php echo $this->Paginator->sort('control');?></th>
	<th><?php echo $this->Paginator->sort('subtotal');?></th>
	<th><?php echo $this->Paginator->sort('tax');?></th>
	<th><?php echo $this->Paginator->sort('total');?></th>
	<th><?php echo $this->Paginator->sort('type');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($invoices as $invoice):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php
				$controller = $invoice['Invoice']['type'] === Invoice::SALES ? 'clients' : 'providers';
			?>
			<?php
				echo $this->Html->link(
					$invoice['Organization']['name'], array(
						'plugin' => 'business',
						'controller' => $controller, 'action' => 'view', $invoice['Organization']['id']
				));
			?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['number']; ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['control']; ?>
		</td>
		<td>
			<?php echo $this->Number->format($invoice['Invoice']['subtotal'], array('places' => 2, 'before' => 'Bs. ', 'escape' => false, 'decimals' => ',', 'thousands' => '.')); ?>
		</td>   
		<td>           
			<?php echo $this->Number->format($invoice['Invoice']['tax'], array('places' => 2, 'before' => 'Bs. ', 'escape' => false, 'decimals' => ',', 'thousands' => '.')); ?>
		</td>
		<!--  --><td>
			<?php echo $this->Number->format($invoice['Invoice']['total'], array('places' => 2, 'before' => 'Bs. ', 'escape' => false, 'decimals' => ',', 'thousands' => '.')); ?>
		</td>
		<td>
			<?php echo $invoice['Invoice']['type'] === Invoice::DRAFT ? __d('default', 'DRAFTINV', true) : __d('default', $invoice['Invoice']['type'], true); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $invoice['Invoice']['id'])); ?>
		<?php if($userData['User']['role'] === '0'): ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $invoice['Invoice']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $invoice['Invoice']['id'])); ?>
		<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<footer><h3><?php echo $this->element('paging'); ?></h3></footer>
</div>


<?php if (!$isReport): ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('View report', true),array_merge(array('action' => 'index', true), $this->params['named'])); ?></li>
	</ul>
</div>
<?php endif; ?>

