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
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        if (isset($this->request->query['terms'])) {
            $terms = $this->request->query['terms'];
        }
        if (empty($terms)) {
            return $this->redirect(array(
                        'controller' => 'pages',
                        'action' => 'backend'
            ));
        }
        $this->Post->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array(
                'Post.terms' => $terms,
            )
        );
        $posts = $this->Paginator->paginate('Post');
        $this->set(compact('posts', 'terms'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
        $this->set('post', $this->Post->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($terms = NULL) {
        if ($this->request->is('post')) {
            $this->check_slug($this->modelClass);
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $terms
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $categories = $this->Post->Category->generateTreeList(array(
            'Category.terms' => $terms
        ));
        $this->set(compact('categories', 'terms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->check_slug($this->modelClass);
            $terms = $this->request->data['Post']['terms'];
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $terms
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
            $this->request->data = $this->Post->find('first', $options);
        }
        $categories = $this->Post->Category->generateTreeList(array(
            'Category.terms' => $terms
        ));
        $this->set(compact('categories'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
//$this->request->onlyAllow('post', 'delete');
        if ($this->Post->delete()) {
            $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
