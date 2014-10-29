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
public function index() {
$this->Link->recursive = 0;
$this->set('links', $this->Paginator->paginate());
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
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
public function add() {
if ($this->request->is('post')) {
$this->Link->create();
if ($this->Link->save($this->request->data)) {
    $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
}
}
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('menus'));
}

/**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function edit($id = null) {
if (!$this->Link->exists($id)) {
throw new NotFoundException(__('Invalid link'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Link->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
$this->request->data = $this->Link->find('first', $options);
}
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('menus'));
}

/**
* delete method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function delete($id = null) {
$this->Link->id = $id;
if (!$this->Link->exists()) {
throw new NotFoundException(__('Invalid link'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Link->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
