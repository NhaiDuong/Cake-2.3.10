<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $layout = 'default';

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'default', array(), 'addSuccess');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array(), 'addError');

        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'default', array(), 'editSuccess');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array(), 'editError');
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User was deleted'), 'default', array(), 'deleteSuccess');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'), 'default', array(), 'deleteError');
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        //Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        $this->layout = 'layout';

    //	if($this->Session->read('Auth.User')){
    //        $this->redirect($this->Auth->redirect());
    //   }
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            else{
                $this->Session->setFlash(__('Invalid username or password, try again!'), 'default', array(), 'loginError');
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}