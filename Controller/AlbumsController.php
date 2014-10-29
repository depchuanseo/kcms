<?php
App::uses('AppController', 'Controller');
/**
 * Albums Controller
 *
 * @property Album $Album
 * @property PaginatorComponent $Paginator
 */
class AlbumsController extends AppController {

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
$this->Album->recursive = 0;
$this->set('albums', $this->Paginator->paginate());
}

/**
* view method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function view($id = null) {
if (!$this->Album->exists($id)) {
throw new NotFoundException(__('Invalid album'));
}
$options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
$this->set('album', $this->Album->find('first', $options));
}

/**
* add method
*
* @return void
*/
public function add() {
if ($this->request->is('post')) {
$this->Album->create();
if ($this->Album->save($this->request->data)) {
    $this->Session->setFlash(__('Đã thêm dữ liệu thành công'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình lưu dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
}
}
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));
}

/**
* edit method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function edit($id = null) {
if (!$this->Album->exists($id)) {
throw new NotFoundException(__('Invalid album'));
}
if ($this->request->is(array('post', 'put'))) {
if ($this->Album->save($this->request->data)) {
    $this->Session->setFlash(__('Dữ liệu đã được cập nhật thành công.'), 'default', array('class' => 'alert alert-success'));
    return $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình cập nhật dữ liệu. Vui lòng kiểm tra và thử lại'), 'default', array('class' => 'alert alert-danger'));
}
} else {
$options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
$this->request->data = $this->Album->find('first', $options);
}
		$categories = $this->Album->Category->find('list');
		$this->set(compact('categories'));
}

/**
* delete method
*
* @throws NotFoundException
* @param string $id
* @return void
*/
public function delete($id = null) {
$this->Album->id = $id;
if (!$this->Album->exists()) {
throw new NotFoundException(__('Invalid album'));
}
//$this->request->onlyAllow('post', 'delete');
if ($this->Album->delete()) {
    $this->Session->setFlash(__('Dữ liệu đã được xóa thành công'), 'default', array('class' => 'alert alert-success'));
    } else {
    $this->Session->setFlash(__('Có lỗi trong quá trình xóa dữ liệu. Vui lòng kiểm tra và thử lại.'), 'default', array('class' => 'alert alert-danger'));
    }
    return $this->redirect(array('action' => 'index'));
}
}
