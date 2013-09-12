<div class="taxTotalizations form">
<?php echo $this->Form->create('TaxTotalization', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php __('Add Tax Totalization');?></legend>
	<?php
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
		<li><?php echo $this->Html->link(__('List Tax Totalizations', true), array('action' => 'index'));?></li>
	</ul>
</div>