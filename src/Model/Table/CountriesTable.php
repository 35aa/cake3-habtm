<?php
namespace App\Model\Table;

class CountriesTable extends Table {

	public function initialize(array $config) {
		$this->belongsToMany('Languages');
	}

	public function getAllCountries() {
		return $this->find()->contain(['Languages'])->all();
	}

	public function getCountryById($countryId) {
		return $this->find()->contain(['Languages'])->where(['id' => $countryId])->first();
	}

	public function createCountry($data) {
		$entity = $this->newEntity($data);
		if (isset($data['languages'])) {
			$entity->languages = $this->Languages->find()->where(['id IN' => $data['languages']])->all()->toArray();
		} else {
			$entity->errors('languages[]', [__('Please select at least one language')]);
		}
		$this->save($entity);
		return $entity;
	}

	public function updateCountry($country, $data) {
		$entity = $this->patchEntity($country, $data);
		if (isset($data['languages'])) {
			$entity->languages = $this->Languages->find()->where(['id IN' => $data['languages']])->all()->toArray();
		} else {
			$entity->errors('languages[]', [__('Please select at least one language')]);
		}
		return $this->save($entity);
	}

}
