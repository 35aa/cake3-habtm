<?php
namespace App\View;

use Cake\View\View;

class AppView extends View {

	public function initialize() {
		parent::initialize();
		$this->loadHelper('Form', [
			'widgets' => [
				'languages' => [
					'App\View\Widget\LanguagesWidget',
					'select',
					'label'
				]
			]
		]);
	}

}
