<?php
$this->layout('layout');
?>
<h1>Home</h1>
<p>Hello,  <?=$this->e($name, 'strip_tags|strtoupper')?></p>