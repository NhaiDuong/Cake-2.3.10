<?php
class UpdateForeignkey extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'updateForeignkey';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
            'create_field' => array(
                'posts' => array(
                    'user_id' => array('type' => 'integer', 'null' => false, 'length' => 50),
                ),
            ),
		),
		'down' => array(

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
