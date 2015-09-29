<?php
namespace App\Controller;

use App\Controller\AppController;

class LanguagesController extends AppController {

	public function index() {
		$this->loadModel('Languages');
		$languages = $this->Languages->getAllLanguages();
		$this->set(compact('languages'));
	}

	public function add() {
		$this->loadModel('Languages');
		if ($this->request->is('post')) {
			$language = $this->Languages->createLanguage($this->request->data);
			if (!$language->hasErrors()) {
				$this->Flash->success(__('Language was created.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('Oups. Language wasn\'t created.'));
			}
		} else {
			$language = $this->Languages->newEntity();
		}
		$this->set(compact('language'));
	}

}
