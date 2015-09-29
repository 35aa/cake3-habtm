<?php
echo $this->Form->create($language);
echo $this->Form->input('name', ['label' => __('Language')]);
echo $this->Form->submit(__('Save'), ['type' => 'submit']);
echo $this->Form->end();
?>