<?php

App::uses('AppController', 'Controller');

/**
 * Links Controller
 *
 * @property Link $Link
 * @property PaginatorComponent $Paginator
 */
class LinksController extends AppController {

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
        if (isset($this->request->query['menu_id'])) {
            $menuId = $this->request->query['menu_id'];
        }
        if (empty($menuId)) {
            return $this->redirect(array(
                        'controller' => 'menus',
                        'action' => 'index'
            ));
        }
        $menu = $this->Link->Menu->findById($menuId);
        if (!isset($menu['Menu']['id'])) {
            return $this->redirect(array(
                        'controller' => 'menus',
                        'action' => 'index'
            ));
        }
        $this->Link->recursive = 0;
        $linksTree = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menuId
        ));
        $linksStatus = $this->Link->find('list', array(
            'conditions' => array(
                'Link.menu_id' => $menuId
            ),
            'fields' => array(
                'Link.id',
                'Link.published'
            )
        ));
        $this->set(compact('linksTree', 'linksStatus', 'menu'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Link->exists($id)) {
            throw new NotFoundException(__('Invalid link'));
        }
        $options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
        $this->set('link', $this->Link->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($menuId = NULL) {
        if ($this->request->is('post')) {
            $this->check_slug($this->modelClass);
            $this->Link->create();
            $this->Link->setTreeScope($this->request->data['Link']['menu_id']);
            if ($this->Link->save($this->request->data)) {
                $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'menu_id' => $this->request->data['Link']['menu_id']
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $parentLinks = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menuId,
        ));
        $menus = $this->Link->Menu->find('list');
        $this->set(compact('menus', 'menuId', 'parentLinks'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Link->exists($id)) {
            throw new NotFoundException(__('Invalid link'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->check_slug($this->modelClass);
            if ($this->Link->save($this->request->data)) {
                $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'menu_id' => $this->request->data['Link']['menu_id']
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
            $this->request->data = $this->Link->find('first', $options);
        }
        $menus = $this->Link->Menu->find('list');
        $menu = $this->Link->Menu->findById($this->request->data['Link']['menu_id']);
        $parentLinks = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menu['Menu']['id']
        ));
        $menuId = $menu['Menu']['id'];
        $this->set(compact('menus', 'parentLinks', 'menuId'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Link->id = $id;
        if (!$this->Link->exists()) {
            throw new NotFoundException(__('Invalid link'));
        }
//$this->request->onlyAllow('post', 'delete');
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash('Link này không tồn tại');
            return $this->redirect(array(
                        'controller' => 'menus',
                        'action' => 'index'
            ));
        }
        $this->Link->setTreeScope($link['Link']['menu_id']);
        if ($this->Link->delete()) {
            $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * MoveUp
     */
    public function admin_moveup($id = NULL, $step = 1) {
        $link = $this->Link->findById($id);
        //pr($link);exit();
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash('ID này không tồn tại', 'default', array('class' => 'error'));
            return $this->redirect(array(
                        'controller' => 'menus',
                        'action' => 'index',
            ));
        }
        $this->Link->setTreeScope($link['Link']['menu_id']);
        if ($this->Link->moveUp($link['Link']['id'], $step)) {
            $this->Session->setFlash('Đã thay đổi thành công', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash('Có lỗi trong quá trình xử lý', 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array(
                    'action' => 'index',
                    '?' => array(
                        'menu_id' => $link['Link']['menu_id'],
                    )
        ));
    }

    /**
     * MoveDown
     */
    public function admin_movedown($id, $step = 1) {
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__d('croogo', 'Invalid id for Link'), 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array(
                        'controller' => 'menus',
                        'action' => 'index',
            ));
        }
        $this->Link->setTreeScope($link['Link']['menu_id']);
        if ($this->Link->moveDown($id, $step)) {
            $this->Session->setFlash('Xử lý thành công', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash('Có lỗi trong quá trình xử lý', 'default', array('class' => 'error'));
        }
        return $this->redirect(array(
                    'action' => 'index',
                    '?' => array(
                        'menu_id' => $link['Link']['menu_id'],
                    ),
        ));
    }

}
