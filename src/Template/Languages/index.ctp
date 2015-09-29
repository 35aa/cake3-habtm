<?php
echo $this->Html->link(
	__('Add language'),
	['controller' => 'languages', 'action' => 'add']
);
?>
<ul>
<?php foreach ($languages as $language) { ?>
	<li><?php echo $language->name;?></li>
<?php } ?>
</ul>
