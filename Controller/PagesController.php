<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function frontend() {
        //BEGIN-SEO
        $meta_title = Configure::read('CFG.meta_title');
        $meta_description = Configure::read('CFG.meta_description');
        $meta_keywords = Configure::read('CFG.meta_keywords');
        $this->set(compact('meta_title', 'meta_description', 'meta_keywords'));
        //END-SEO
    }

    public function admin_backend() {
        
    }

}
