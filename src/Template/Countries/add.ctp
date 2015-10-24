<?php
echo $this->Form->create($country);
echo $this->Form->input('name', ['label' => __('Country')]);
echo $this->Form->input(
	'languages[]',
	['type' => 'languages', 'label' => __('Languages'), 'options' => $languages, 'empty' => __('Select languages'), 'multiple']
);
echo $this->Form->submit(__('Save'), ['type' => 'submit']);
echo $this->Form->end();
?>
