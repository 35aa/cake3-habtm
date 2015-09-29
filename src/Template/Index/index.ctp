<?php
echo $this->Html->link(
	__('Countries'),
	['controller' => 'countries', 'action' => 'index']
);
?>
&nbsp;
<?php
echo $this->Html->link(
	__('Languages'),
	['controller' => 'languages', 'action' => 'index']
);
?>
<ul>
<?php foreach ($countries as $country) { ?>
	<li>
<?php
echo $country->name;
$languages = [];
foreach ($country->languages as $language) {
	$languages[] = $language->name;
}
?>
&nbsp;(<?php echo implode(', ', $languages);?>)
	</li>
<?php } ?>
</ul>
