<?php
class Updatedob extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'updatedob';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'users' => array(
					'dob' => array('type' => 'date', 'null' => false, 'default' => null),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'users' => array(
					'dob' => array('type' => 'datetime', 'null' => false, 'default' => null),
				),
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
