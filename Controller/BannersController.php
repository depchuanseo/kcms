<?php

App::uses('AppController', 'Controller');

/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 */
class BannersController extends AppController {

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
        $this->Banner->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array(
                'terms' => $terms,
            )
        );
        $this->set('banners', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Banner->exists($id)) {
            throw new NotFoundException(__('Invalid banner'));
        }
        $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
        $this->set('banner', $this->Banner->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($terms = null) {
        if ($this->request->is('post')) {
            $this->check_slug($this->modelClass);
            $result = $this->uploadFile($this->modelClass);
            if ($result['status']) {
                $this->Session->setFlash('Upload ảnh thành công', 'default', array('class' => 'alert alert-success'));
                $this->request->data[$this->modelClass]['image'] = $result['file_path'];

                $this->Banner->create();
                if ($this->Banner->save($this->request->data)) {
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
            } else {
                $this->Session->setFlash('Có lỗi trong quá trình upload ảnh. Vui lòng thử lại', 'default', array('class' => 'alert alert-danger'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $terms
                            )
                ));
            }
        }
        $this->set(compact('terms'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Banner->exists($id)) {
            throw new NotFoundException(__('Invalid banner'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->check_slug($this->modelClass);
            if (empty($this->request->data[$this->modelClass]['image']['tmp_name'])) {
                unset($this->request->data[$this->modelClass]['image']);
            } else {
                $result = $this->uploadFile($this->modelClass);
                if ($result['status']) {
                    $this->Session->setFlash('Upload ảnh thành công', 'default', array('class' => 'alert alert-success'));
                    $this->request->data[$this->modelClass]['image'] = $result['file_path'];
                }
            }
            if ($this->Banner->save($this->request->data)) {
                $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $this->request->data[$this->modelClass]['terms']
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
            $this->request->data = $this->Banner->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Banner->id = $id;
        if (!$this->Banner->exists()) {
            throw new NotFoundException(__('Invalid banner'));
        }
//$this->request->onlyAllow('post', 'delete');
        if ($this->Banner->delete()) {
            $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
