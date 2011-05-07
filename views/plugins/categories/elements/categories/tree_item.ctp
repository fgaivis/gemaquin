<?php
$link = $this->Html->link($data[$modelName]['name'], array('action' => 'admin_edit', $data[$modelName]['id']));
echo '<span id="' . $data[$modelName]['id'] . '">' . $link . '</span>';
?>