<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'edit')));?>
	<header><h3><?php echo __('Edit Invoice',true);?></h3></header>
	<fieldset>
	
	<?php $invoice = $this->data['Invoice']; ?>
	
	<?php if($invoice['type'] === Invoice::PURCHASE || $invoice['type'] === Invoice::DRAFT) : ?>
		<?php 
			echo $this->Form->input('id');
			echo $this->Form->input('created', array('type' => 'date'));
			echo $this->Form->input('number');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('shipping');
			echo $this->Form->input('customs_tax');
			echo $this->Form->input('customs_adm');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('type');
		?>	
	<?php elseif($invoice['type'] === Invoice::SALES) : ?>
		<?php 
			echo $this->Form->input('id');
			echo $this->Form->input('control');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('type');
		?>	
	<?php elseif($invoice['type'] === Invoice::SERVICE) : ?>
		<?php 
			echo $this->Form->input('id');
			echo $this->Form->input('created', array('type' => 'date'));
			echo $this->Form->input('number');
			echo $this->Form->input('control');
			echo $this->Form->hidden('subtotal', array('value' => 0));
			echo $this->Form->input('total_no_exempt');
			echo $this->Form->input('total_exempt');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->hidden('type');
		?>
	<?php endif; ?>
 		
	<?php
		/*echo $this->Form->input('id');
		echo $this->Form->input('number');
		echo $this->Form->input('control');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('subtotal');
		echo $this->Form->input('tax');
		echo $this->Form->input('total');
		echo $this->Form->input('insurance');
		echo $this->Form->input('shipping');
		echo $this->Form->input('customs_tax');
		echo $this->Form->input('customs_adm');
		echo $this->Form->input('internal_shipping');
		echo $this->Form->hidden('type');*/
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Invoices', true), array('action' => 'index'));?></li>
	</ul>
</div>