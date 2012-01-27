
<div class="purchaseOrders form">
    <header><h3><?php __('Best Selling Items');?></h3></header>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <!-- <th><?php //echo $this->Paginator->sort('id');?></th> -->
            <th><?php echo __('Name', true);?></th>
            <th><?php echo __('Barcode', true);?></th>
            <th><?php echo __('Package Factor', true);?></th>
            <th><?php echo __('Sales Factor', true);?></th>
            <th><?php echo __('Category', true);?></th>
            <th><?php echo __('Quantity', true);?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($items as $item):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class;?>>
                <td>
                    <?php echo $item['Item']['name']; ?>
                </td>
                <td>
                    <?php echo $item['Item']['barcode']; ?>
                </td>
                <td>
                    <?php echo $item['Item']['package_factor']; ?>
                </td>
                <td>
                    <?php echo $item['Item']['sales_factor']; ?>
                </td>
                <td>
                    <?php echo $item['Category']['name']; ?>
                </td>
                <td>
                    <?php echo $item[0]['quantity']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>

</div>
<div class="actions">
	<ul>
		<li><?php echo (!$isReport ? $this->Html->link(__('View report', true), array('action' => 'best_selling', true)) : ''); ?></li>
	</ul>
</div>
