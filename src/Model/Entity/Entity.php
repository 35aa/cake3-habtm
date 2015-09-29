<?php
namespace App\Model\Entity;

class Entity extends \Cake\ORM\Entity {

	public function hasErrors() {
		return count($this->errors());
	}

}
