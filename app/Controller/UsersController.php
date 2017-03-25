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
                 $this->Session->setFlash(__('The user has been saved'));
                 return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
          //      $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
        //    $this->Flash->error(
              //  __('The user could not be saved. Please, try again.')
         //   );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
        //    $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
      //  $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        $this->layout = 'layout';
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect(array('controller'=>'posts', 'action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('Invalid username or password.'), 'default', array(), 'loginError');
            }
        }
    }


    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}