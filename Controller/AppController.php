<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Session',
        'Tool',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'backend'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'backend'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller') // Added this line
        )
    );

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['group_id']) && $user['group_id'] == 1) {
            return true;
        }

        // Default deny
        return false;
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        if ((isset($this->params['prefix']) && ($this->params['prefix'] === 'admin'))) {
            $this->layout = 'backend';
            $this->theme = 'Backend';
            $this->Auth->deny();
        }
        $this->loadModel('Configuration');
        $this->Configuration->load('CFG');
    }

    public function check_slug($model, $name = 'title', $slug_field = 'slug') {
        if (empty($this->request->data[$model][$slug_field])) {
            $this->request->data[$model][$slug_field] = $this->Tool->slug($this->request->data[$model][$name]);
        } else {
            $this->request->data[$model][$slug_field] = $this->Tool->slug($this->request->data[$model][$slug_field]);
        }
    }

    public function uploadFile($model, $field = 'image', $slug_field = 'slug') {
        $file = new File($this->request->data[$model][$field]['tmp_name']);

        $arr = explode('.', $this->request->data[$model][$field]['name']);
        $ext = end($arr);
        $file_name = $this->request->data[$model][$slug_field] . '.' . $ext;
        if ($file->copy(APP . 'webroot/files/' . $model . '/' . $file_name)) {
            $result = array(
                'status' => true,
                'file_name' => $file_name,
                'file_path' => '/files/' . $model . '/' . $file_name,
            );
        } else {
            $result = array(
                'status' => false,
                'file_name' => $file_name,
                'file_path' => '/files/' . $model . '/' . $file_name,
            );
        }
        return $result;
    }

}
