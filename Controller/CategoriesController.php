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
public function index() {
$this->Category->recursive = 0;
$this->set('categories', $this->Paginator->paginate());
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
public function add() {
if ($this->request->is('post')) {
$this->Category->create();
if ($this->Category->save($this->request->data)) {
    $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
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
public function edit($id = null) {
if (!$this->Category->exists($id)) {
throw new NotFoundException(__('Invalid category'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Category->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
$this->request->data = $this->Category->find('first', $options);
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
$this->Category->id = $id;
if (!$this->Category->exists()) {
throw new NotFoundException(__('Invalid category'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Category->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
