<?php
namespace App\Controller;

use App\Controller\AppController;

class CountriesController extends AppController {

	public function index() {
		$this->loadModel('Countries');
		$countries = $this->Countries->getAllCountries();
		$this->set(compact('countries'));
	}

	public function add() {
		$this->loadModel('Countries');
		if ($this->request->is('post')) {
			$country = $this->Countries->createCountry($this->request->data);
			if (!$country->hasErrors()) {
				$this->Flash->success(__('Country was created.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Oups. Country wasn\'t created.'));
			}
		} else {
			$country = $this->Countries->newEntity();
		}
		$languages = $this->Countries->Languages->getAllLanguagesList();
		$this->set(compact('country', 'languages'));
	}

}
