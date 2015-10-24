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

	public function edit($countryId = null) {
		if (!\Cake\Validation\Validation::naturalNumber($countryId)) {
			$this->Flash->error(__('Invalid country ID'));
			return $this->redirect(['action' => 'index']);
		}
		$this->loadModel('Countries');
		$country = $this->Countries->getCountryById($countryId);
		if (!$country) {
			$this->Flash->error(__('Oups. Country with this ID not exist.'));
			return $this->redirect(['action' => 'index']);
		}
		if ($this->request->is(['post', 'put', 'patch'])) {
			if ($this->Countries->updateCountry($country, $this->request->data)) {
				$this->Flash->success(__('Country was updated.'));
				return $this->redirect(['controller' => 'index', 'action' => 'index']);
			} else {
				$this->Flash->error(__('Oups. Country wasn\'t updated.'));
			}
		}
		$this->loadModel('Languages');
		$languages = $this->Languages->getAllLanguagesList();
		$this->set(compact('country', 'languages'));
		$this->render('add');
	}

}
