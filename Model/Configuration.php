<?php

App::uses('AppModel', 'Model');

/**
 * Configuration Model
 *
 */
class Configuration extends AppModel {

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
        'key' => array(
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
                'message' => 'Key đã tồn tại, vui lòng chọn key mới'
            ),
        ),
        'value' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    function load($prefix = 'CFG') {
        $settings = $this->find('all');
        foreach ($settings as $variable) {
            Configure::write("$prefix.{$variable['Configuration']['key']}", $variable['Configuration']['value']);
        }
    }

    function saveConfig($key, $value) {
        $result = $this->find('first', array(
            'conditions' => array('Configuration.key' => $key)
        ));
        if (!empty($result)) {
            $this->id = $result['Configuration']['id'];
            return $this->saveField('value', $value);
        } else {
            return $this->save(array(
                        'key' => $key,
                        'value' => $value
            ));
        }
    }

}
