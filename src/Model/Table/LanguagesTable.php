<?php
namespace App\Model\Table;

class LanguagesTable extends Table {

	public function initialize(array $config) {
		$this->belongsToMany('Countries');
	}

	public function getAllLanguages() {
		return $this->find()->all();
	}

	public function createLanguage($data) {
		$entity = $this->newEntity($data);
		$this->save($entity);
		return $entity;
	}

	public function getAllLanguagesList() {
		return $this->find('list')->all();
	}

}
