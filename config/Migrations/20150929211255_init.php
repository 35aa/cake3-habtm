<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration {

	public function change() {
		$table = $this->table('countries');
		$table->addColumn('name', 'string')->create();

		$table = $this->table('languages');
		$table->addColumn('name', 'string')->create();

		$table = $this->table('countries_languages');
		$table->addColumn('country_id', 'integer')
					->addColumn('language_id', 'integer')
					->create();
	}

}
