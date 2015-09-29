<?php
namespace App\Controller;

class IndexController extends AppController {

	public function index() {
		$this->loadModel('Countries');
		$countries = $this->Countries->getAllCountries();
		$this->set(compact('countries'));
	}

}
