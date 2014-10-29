<?php

App::uses('AppModel', 'Model');

/**
 * Link Model
 *
 * @property Menu $Menu
 */
class Link extends AppModel {

    public $actsAs = array(
        'Tree',
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'menu_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
        ),
        'link' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
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
        'Menu' => array(
            'className' => 'Menu',
            'foreignKey' => 'menu_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * Allow to change Tree scope to a specific menu
     *
     * @param int $menuId menu id
     * @return void
     */
    public function setTreeScope($menuId) {
        $settings = array(
            'scope' => array($this->alias . '.menu_id' => $menuId),
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
        if (!isset($this->data['Link']['menu_id']) || !isset($this->data['Link']['id'])) {
            return true;
        }
        $previousMenuId = $this->field('menu_id', array(
            $this->escapeField('id') => $this->data['Link']['id']
        ));
        $hasMenuChanged = ($previousMenuId != $this->data['Link']['menu_id']);
        if ($hasMenuChanged) {
            $this->_previousMenuId = $previousMenuId;
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
        if (isset($this->_previousMenuId)) {
            $this->setTreeScope($this->data['Link']['menu_id']);
            $this->recover();
            $this->setTreeScope($this->_previousMenuId);
            $this->recover();
            unset($this->_previousMenuId);
        }
    }

}
