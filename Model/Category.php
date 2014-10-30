<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Album $Album
 * @property Post $Post
 * @property Product $Product
 */
class Category extends AppModel {

    public $actsAs = array(
        'Tree',
        'Upload.Upload' => array(
            'image' => array(
                'path' => '{ROOT}webroot{DS}files{DS}{model}{DS}',
//                'thumbnailQuality' => 100,
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true,
//                'thumbnailSizes' => array(
//                    'biggest' => '780x250',
//                    'big' => '390x265',
//                    'medium' => '410x250',
//                    'small' => '120x115',
//                ),
//                'thumbnailMethod' => 'php',
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Product' => array(
            'className' => 'Product',
            'foreignKey' => 'category_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    /**
     * Allow to change Tree scope to a specific menu
     *
     * @param int $menuId menu id
     * @return void
     */
    public function setTreeScope($terms) {
        $settings = array(
            'scope' => array($this->alias . '.terms' => $terms),
        );
        if ($this->Behaviors->loaded('Tree')) {
            $this->Behaviors->Tree->setup($this, $settings);
        } else {
            $this->Behaviors->load('Tree', $settings);
        }
    }

    /**
     * If we are moving between Menus, save original id so that Link::afterSave()
     * recover() can recover the tree
     *
     */
    public function beforeSave($options = array()) {
        if (!isset($this->data['Category']['terms']) || !isset($this->data['Category']['id'])) {
            return true;
        }
        $previousTerms = $this->field('terms', array(
            $this->escapeField('id') => $this->data['Category']['id']
        ));
        $hasMenuChanged = ($previousTerms != $this->data['Category']['terms']);
        if ($hasMenuChanged) {
            $this->_previousTerms = $previousTerms;
        }

        return true;
    }

    /**
     * Calls TreeBehavior::recover when we are changing scope
     */
    public function afterSave($created, $options = array()) {
        if ($created) {
            return;
        }
        if (isset($this->_previousTerms)) {
            $this->setTreeScope($this->data['Category']['terms']);
            $this->recover();
            $this->setTreeScope($this->_previousTerms);
            $this->recover();
            unset($this->_previousTerms);
        }
    }

}
