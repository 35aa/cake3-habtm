<?php
namespace App\View\Widget;

use Cake\View\Widget\SelectBoxWidget;

class LanguagesWidget extends SelectBoxWidget {

	public function render(array $data, \Cake\View\Form\ContextInterface $context) {
		$values = [];
		if ($context->val('languages')) {
			foreach ($context->val('languages') as $language) {
				if (is_object($language)) {
					$values[] = $language->id;
				}
				else {
					$values[] = $language;
				}
			}
			$data['val'] = $values;
		}
		$data['type'] = 'select';
		return parent::render($data, $context);
	}

}
