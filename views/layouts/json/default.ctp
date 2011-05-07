<?php
header('Content-type: application/json');

if (empty($jsonRedirect)) {
        $jsonRedirect = 'null';
}

$jsonResponse = '{
        "success": true,
        "message": ' . json_encode($this->Session->flash()) . ',
        "redirect": ' . json_encode($jsonRedirect) . ',
        "content": ' . $content_for_layout . '
}';

echo empty($_GET['callback']) ? $jsonResponse : $_GET['callback'] . '(' . $jsonResponse . ')';

