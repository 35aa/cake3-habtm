<?php
echo $this->Html->link(
	__('Add country'),
	['controller' => 'countries', 'action' => 'add']
);
?>
<ul>
<?php foreach ($countries as $country) { ?>
	<li><?php echo $country->name;?></li>
<?php } ?>
</ul>
