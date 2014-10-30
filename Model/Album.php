<?php

App::uses('AppModel', 'Model');

/**
 * Album Model
 *
 * @property Category $Category
 */
class Album extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'path' => '{ROOT}webroot{DS}files{DS}{model}{DS}',
                'thumbnailQuality' => 100,
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true,
                'thumbnailSizes' => array(
                    'medium' => '410x250',
                    'small' => '120x115',
                ),
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
                'rule' => 'isUnique',
                'message' => 'Slug đã tồn tại, vui lòng chọn Slug mới'
            ),
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

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'AlbumsImage' => array(
            'className' => 'AlbumsImage',
            'foreignKey' => 'foreign_key',
            'conditions' => array(
                'AlbumsImage.model' => 'Album',
            ),
            'dependent' => true,
            'exclusive' => true,
        ),
    );

    public function createWithAttachments($data) {
        // Sanitize your images before adding them
        $images = array();
        if (!empty($data['AlbumsImage'][0])) {
            foreach ($data['AlbumsImage'] as $i => $image) {
                if (is_array($data['AlbumsImage'][$i])) {
                    // Force setting the `model` field to this model
                    $image['model'] = 'Album';

                    // Unset the foreign_key if the user tries to specify it
                    if (isset($image['foreign_key'])) {
                        unset($image['foreign_key']);
                    }

                    $images[] = $image;
                }
            }
        }
        $data['AlbumsImage'] = $images;

        // Try to save the data using Model::saveAll()
        $this->create();
        if ($this->saveAll($data)) {
            return true;
        }

        // Throw an exception for the controller
        throw new Exception(__("This post could not be saved. Please try again"));
    }

}
