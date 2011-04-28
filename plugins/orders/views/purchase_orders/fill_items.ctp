<ul>
<?php foreach ($items as $id => $item) {
    	echo $this->Html->tag('li', $item, array('id' => $id));
      }
?>
</ul>

