<div class="invoices form">
<?php echo $this->Form->create('Invoice', array('url' => array('action' => 'add')));?>
	<fieldset>
	<?php
		if (isset($this->data['PurchaseOrder'])) {
			echo $this->Form->input('number');
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('shipping');
			echo $this->Form->input('customs_tax');
			echo $this->Form->input('customs_adm');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('Invoice.type', array('value' => $this->data['Invoice']['type']));
			echo $this->Form->hidden('PurchaseOrder.id', array('value' => $this->data['PurchaseOrder']['id']));				
		} else if (isset($this->data['SalesOrder'])) {
			echo $this->Form->input('number');
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('insurance');
			echo $this->Form->input('internal_shipping');
			echo $this->Form->hidden('Invoice.type', array('value' => $this->data['Invoice']['type']));
		} else {
			echo $this->Form->input('number');
			echo $this->Form->input('organization_id');
			echo $this->Form->input('subtotal');
			echo $this->Form->input('tax');
			echo $this->Form->input('total');
			echo $this->Form->input('type');
		}
		
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit'));?>
<?php echo $this->Form->end(__d('default', 'Submit', true));?>
</div>