<?php
App::uses('AppController', 'Controller');
/**
 * Albumsimages Controller
 *
 * @property Albumsimage $Albumsimage
 * @property PaginatorComponent $Paginator
 */
class AlbumsimagesController extends AppController {

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
$this->Albumsimage->recursive = 0;
$this->set('albumsimages', $this->Paginator->paginate());
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
if (!$this->Albumsimage->exists($id)) {
throw new NotFoundException(__('Invalid albumsimage'));
}
$options = array('conditions' => array('Albumsimage.' . $this->Albumsimage->primaryKey => $id));
$this->set('albumsimage', $this->Albumsimage->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Albumsimage->create();
if ($this->Albumsimage->save($this->request->data)) {
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
if (!$this->Albumsimage->exists($id)) {
throw new NotFoundException(__('Invalid albumsimage'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Albumsimage->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Albumsimage.' . $this->Albumsimage->primaryKey => $id));
$this->request->data = $this->Albumsimage->find('first', $options);
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
$this->Albumsimage->id = $id;
if (!$this->Albumsimage->exists()) {
throw new NotFoundException(__('Invalid albumsimage'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Albumsimage->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
