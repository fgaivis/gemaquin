<div class="taxTotalizations form">
<?php echo $this->Form->create('TaxTotalization', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php __('Edit Tax Totalization');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('year');
		echo $this->Form->input('month');
		echo $this->Form->input('purchases');
		echo $this->Form->input('sales');
		echo $this->Form->input('tax_relation');
		echo $this->Form->input('tax_withholdings');
		echo $this->Form->input('tax_holded');
		echo $this->Form->input('withholdings_relation');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('TaxTotalization.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tax Totalizations', true), array('action' => 'index'));?></li>
	</ul>
</div>