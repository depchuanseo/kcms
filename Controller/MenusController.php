<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 */
class MenusController extends AppController {

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
$this->Menu->recursive = 0;
$this->set('menus', $this->Paginator->paginate());
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
if (!$this->Menu->exists($id)) {
throw new NotFoundException(__('Invalid menu'));
}
$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
$this->set('menu', $this->Menu->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Menu->create();
if ($this->Menu->save($this->request->data)) {
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
if (!$this->Menu->exists($id)) {
throw new NotFoundException(__('Invalid menu'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Menu->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
$this->request->data = $this->Menu->find('first', $options);
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
$this->Menu->id = $id;
if (!$this->Menu->exists()) {
throw new NotFoundException(__('Invalid menu'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Menu->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
