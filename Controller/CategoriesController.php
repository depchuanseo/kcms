<?php

App::uses('AppController', 'Controller');

/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
        $this->Category->recursive = 0;
        $categoriesTree = $this->Category->generateTreeList(array(
            'Category.terms' => $terms,
        ));
        $categoriesStatus = $this->Category->find('list', array(
            'conditions' => array(
                'Category.terms' => $terms,
            ),
            'fields' => array(
                'Category.id',
                'Category.published'
            )
        ));
        $categoriesSlug = $this->Category->find('list', array(
            'conditions' => array(
                'Category.terms' => $terms,
            ),
            'fields' => array(
                'Category.id',
                'Category.slug'
            )
        ));
        $this->set(compact('categoriesTree', 'categoriesStatus', 'categoriesSlug', 'terms'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
        $this->set('category', $this->Category->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add($terms = null) {
        if ($this->request->is('post')) {
            $this->check_slug($this->modelClass);
            $this->Category->create();
            $this->Category->setTreeScope($this->request->data[$this->modelClass]['terms']);
            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $this->request->data['Category']['terms']
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $this->Category->recursive = 0;
        $categoriesTree = $this->Category->generateTreeList(array(
            'Category.terms' => $terms,
        ));
        $optionsTemplate = array(
            NULL => 'Default',
            'aboutus' => 'About Us'
        );
        $this->set(compact('optionsTemplate', 'terms', 'categoriesTree'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->check_slug($this->modelClass);

            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array(
                            'action' => 'index',
                            '?' => array(
                                'terms' => $this->request->data['Category']['terms']
                            )
                ));
            } else {
                $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }
        $terms = $this->request->data['Category']['terms'];
        $this->Category->recursive = 0;
        $categoriesTree = $this->Category->generateTreeList(array(
            'Category.terms' => $terms,
        ));
        $optionsTemplate = array(
            NULL => 'Default',
            'aboutus' => 'About Us'
        );
        $currentTemplate = $this->request->data['Category']['template'];
        $parentCategories = $this->Category->generateTreeList(array(
            'Category.terms' => $terms
        ));
        $this->set(compact('parentCategories', 'optionsTemplate', 'currentTemplate', 'categoriesTree'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
//$this->request->onlyAllow('post', 'delete');
        $category = $this->Category->findById($id);
        if (!isset($category['Category']['id'])) {
            $this->Session->setFlash('Danh mục này không tồn tại');
            return $this->redirect(array(
                        'controller' => 'pages',
                        'action' => 'backend'
            ));
        }
        $this->Category->setTreeScope($category['Category']['terms']);
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array(
                    'action' => 'index',
                    '?' => array(
                        'terms' => $category['Category']['terms'],
                    )
        ));
    }

    /**
     * MoveUp
     */
    public function admin_moveup($id = NULL, $step = 1) {
        $category = $this->Category->findById($id);
        //pr($link);exit();
        if (!isset($category['Category']['id'])) {
            $this->Session->setFlash('ID này không tồn tại', 'default', array('class' => 'error'));
            return $this->redirect(array(
                        'controller' => 'pages',
                        'action' => 'backend',
            ));
        }
        $this->Category->setTreeScope($category['Category']['terms']);
        if ($this->Category->moveUp($category['Category']['id'], $step)) {
            $this->Session->setFlash('Đã thay đổi thành công', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash('Có lỗi trong quá trình xử lý', 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array(
                    'action' => 'index',
                    '?' => array(
                        'terms' => $category['Category']['terms'],
                    )
        ));
    }

    /**
     * MoveDown
     */
    public function admin_movedown($id, $step = 1) {
        $category = $this->Category->findById($id);
        if (!isset($category['Category']['id'])) {
            $this->Session->setFlash(__d('croogo', 'Invalid id for Link'), 'default', array('class' => 'alert alert-danger'));
            return $this->redirect(array(
                        'controller' => 'pages',
                        'action' => 'backend',
            ));
        }
        $this->Category->setTreeScope($category['Category']['terms']);
        if ($this->Category->moveDown($id, $step)) {
            $this->Session->setFlash('Xử lý thành công', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash('Có lỗi trong quá trình xử lý', 'default', array('class' => 'error'));
        }
        return $this->redirect(array(
                    'action' => 'index',
                    '?' => array(
                        'menu_id' => $category['Category']['terms'],
                    ),
        ));
    }
}
