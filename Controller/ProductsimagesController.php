<?php
App::uses('AppController', 'Controller');
/**
 * Productsimages Controller
 *
 * @property Productsimage $Productsimage
 * @property PaginatorComponent $Paginator
 */
class ProductsimagesController extends AppController {

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
$this->Productsimage->recursive = 0;
$this->set('productsimages', $this->Paginator->paginate());
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
if (!$this->Productsimage->exists($id)) {
throw new NotFoundException(__('Invalid productsimage'));
}
$options = array('conditions' => array('Productsimage.' . $this->Productsimage->primaryKey => $id));
$this->set('productsimage', $this->Productsimage->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Productsimage->create();
if ($this->Productsimage->save($this->request->data)) {
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
if (!$this->Productsimage->exists($id)) {
throw new NotFoundException(__('Invalid productsimage'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Productsimage->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Productsimage.' . $this->Productsimage->primaryKey => $id));
$this->request->data = $this->Productsimage->find('first', $options);
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
$this->Productsimage->id = $id;
if (!$this->Productsimage->exists()) {
throw new NotFoundException(__('Invalid productsimage'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Productsimage->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
