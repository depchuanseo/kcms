<?php

App::uses('AppModel', 'Model');

/**
 * Banner Model
 *
 */
class Banner extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'path' => '{ROOT}webroot{DS}files{DS}{model}{DS}',
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true,
                'thumbnailMethod' => 'php',
            ),
        ),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'terms' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'slug' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Slug này đã tồn tại. Vui lòng chọn Slug khác'
            )
        ),
        'published' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

}
