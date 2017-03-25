<?php
class UpdateSlugMigration extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'UpdateSlug';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
            'create_field' => array(
                'posts' => array(
                    'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50,
                        'collate' => 'latin1_swedish_ci', 'charset' => 'latin1', 'after' => 'created'),
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
        if ($direction == 'up'){
            $Post = ClassRegistry::init('Post');
            $posts = $Post->find('list');
            foreach ($posts as $id => $name){
                $Post->id = $id;
                $Post->saveField('slug', strtolower(Inflector::slug($name, '-')), false);
            }
        }
		return true;
	}
}
