<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css('print'); ?>
</head>
<body>
<div class="page_margins">
	<div class="page">
		<?php echo $content_for_layout; ?>
  </div>
</div>
<script> //window.print(); </script>
</body>
</html>