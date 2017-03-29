<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {
    public $validate = array(
//        'title' => array(
//            'required' => array(
//                'rule' => 'notBlank',
//                'message' => 'A title is required.'
//            )
//        ),
//        'body' => array(
//            'required' => array(
//                'rule' => 'notBlank',
//                'message' => 'A content is required.'
//            )
//        ),
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    public $findMethods = array('search' => true);

    public function search($post){
        $posts = $this->find('all', array(
            'conditions' => array('Post.title' => $post)
        ));
        return $posts;
    }

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
    }
}
