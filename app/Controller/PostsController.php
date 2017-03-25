<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {
    public $layout = 'layout';


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
                $condition = array("Post.title LIKE '%$keyword%'");
                $posts = $this->Post->find('all',array('conditions' => $condition));
                if ($posts){
                    $this->set('posts', $posts);
                }
                else
                    $this->Session->setFlash(__('No result match!'), 'default', array(), 'noResult');
            }else{
                $this->Paginator->settings = array(
                    'Post' => array(
                        'paramType' => 'querystring',
                        'limit' => 10,
                        'order' => array('Post.created' => 'desc'
                        )
                    )
                );
                $this->Post->recursive = 0;
                $this->set('posts', $this->Paginator->paginate());
            }
        }
        //find the latest modified post
        $condition = array(
            'limit' => 10,
            'order' => 'Post.modified asc',
            );
        $modified = $this->Post->find('all', $condition);
        $this->set('modified', $modified);
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
    }


    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Auth->user('id')){
//                $this->Flash->set(__('You must login first.'), array('key' => 'noti'));
            }else{
                $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                if ($this->Post->save($this->request->data)) {
//                    $this->Flash->set(__('Your post has been saved.'), array('key' => 'addPostSuccess'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($slug = null) {
        if (!$slug) {
            throw new NotFoundException('Invalid post');
        }
        $post = $this->Post->findBySlug($slug);
        if (!$post) {
            throw new NotFoundException('Invalid post');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Post->save($this->request->data)) {
//                $this->Flash->success(__('The post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Post.slug' => $slug));
            $this->request->data = $this->Post->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Post->delete()) {
//            $this->Flash->set(__('Post was deleted'), array('key'=>'deletePostSuccess'));
            return $this->redirect(array('action' => 'index'));
        }
//        $this->Flash->error(__('Post was not deleted'));
        return $this->redirect(array('action' => 'index'));
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
}
