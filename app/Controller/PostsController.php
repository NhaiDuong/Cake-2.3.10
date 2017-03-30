<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index($keyword = null) {
        //load model user
        $this->loadModel('User');
        if ($this->Auth->user('id')){
            $this->set('user', $this->Auth->user('id'));
        }
        if ($this->request->is('get')){
            if(isset($this->params->query['keyword'])){
                $keyword = $this->params->query['keyword'];
                $con = array("Post.title LIKE '%$keyword%'");
                $posts = $this->Post->find('all',array('conditions' => $con));
                if ($posts){
                    $this->Post->recursive = 0;
                    $this->Paginator->settings = array(
                        'limit' => 10,
                        'conditions' => $con
                    );
                    $this->set('posts', $this->Paginator->paginate());
                }
                else
                    $this->Session->setFlash(__('No result match!'), 'default', array(), 'noResult');
            }else{
                $this->Paginator->settings = array(
                    'Post' => array(
                        'limit' => 10,
                        'order' => array('Post.created' => 'desc'
                        )
                    )
                );
                $this->Post->recursive = 0;
                $this->set('posts', $this->Paginator->paginate());
            }
        }
        //find the oldest modified posts
        $condition = array(
            'limit' => 10,
            'order' => 'Post.modified asc',
        );
        $modified = $this->Post->find('all', $condition);
        $this->set('modified', $modified);

        //find the latest modified posts using ajax
        $condition1 = array(
            'limit' => 10,
            'order' => 'Post.modified desc',
        );
        $latest = $this->Post->find('all', $condition1);
        $this->set('latest', $latest);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function view($slug = null) {
        if (!$slug) {
            throw new NotFoundException('Invalid post');
        }
        $post = $this->Post->findBySlug($slug);
        if (!$post) {
            throw new NotFoundException('Invalid post');
        }
        $this->Post->updateAll(
            array('Post.viewCount' => 'Post.viewCount + 1'),
            array('Post.slug' => $slug)

        );
        $this->set(compact('post'));

        //find the latest modified post
        $condition = array(
            'limit' => 10,
            'order' => 'Post.modified asc',
        );
        $modified = $this->Post->find('all', $condition);
        $this->set('modified', $modified);
        //find the latest modified posts using ajax
        $condition1 = array(
            'limit' => 10,
            'order' => 'Post.modified desc',
        );
        $latest = $this->Post->find('all', $condition1);
        $this->set('latest', $latest);
    }


    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if (!$this->Auth->user('id')){
                $this->Session->setFlash(__('You must login first.'), 'default', array(), 'login');
            }else{
                $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                $title = $this->request->data['Post']['title'];
                $this->request->data['Post']['slug'] = $this->createSlug($title);
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash(__('Your post has been saved.'), 'default', array(), 'addPostSuccess');
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }
        //find the oldest modified posts
        $condition = array(
            'limit' => 10,
            'order' => 'Post.modified asc',
        );
        $modified = $this->Post->find('all', $condition);
        $this->set('modified', $modified);

        //find the latest modified posts using ajax
        $condition1 = array(
            'limit' => 10,
            'order' => 'Post.modified desc',
        );
        $latest = $this->Post->find('all', $condition1);
        $this->set('latest', $latest);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is('post')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'), 'default', array(), 'addPostSuccess');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'default', array(), 'editPostError');
        }
        if (!$this->request->data) {
            $this->request->data = $post;
        }
        //find the oldest modified posts
        $condition = array(
            'limit' => 10,
            'order' => 'Post.modified asc',
        );
        $modified = $this->Post->find('all', $condition);
        $this->set('modified', $modified);

        //find the latest modified posts using ajax
        $condition1 = array(
            'limit' => 10,
            'order' => 'Post.modified desc',
        );
        $latest = $this->Post->find('all', $condition1);
        $this->set('latest', $latest);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function delete($id = null) {
        if ($this->request->is('get')) {
            if ($this->Post->delete($id)) {
                $this->Session->setFlash(__('Post was deleted'), 'default', array(), 'deletePostSuccess');
            } else {
                $this->Session->setFlash(__('Post was not deleted'), 'default', array(), 'deletePostError');
            }
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }
        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    function createSlug ($string, $id=null) {
        $slug = Inflector::slug ($string,'-');
        $slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params ['conditions']= array();
        $params ['conditions']['Post.slug']= $slug;
        if (!is_null($id)) {
            $params ['conditions']['not'] = array('Post.id'=>$id);
        }
        while (count($this->Post->find ('all',$params))) {
            if (!preg_match ('/-{1}[0-9]+$/', $slug )) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
            }
            $params ['conditions']['Post.slug']= $slug;
        }
        return $slug;
    }
}
