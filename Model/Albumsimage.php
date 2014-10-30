<?php

App::uses('AppModel', 'Model');

/**
 * Albumsimage Model
 *
 */
class Albumsimage extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'attachment' => array(
                'path' => '{ROOT}webroot{DS}files{DS}{model}{DS}',
                'thumbnailQuality' => 100,
                'deleteOnUpdate' => true,
                'deleteFolderOnDelete' => true,
                'thumbnailSizes' => array(
                    'small' => '120x80',
                ),
                'thumbnailMethod' => 'php',
            ),
        ),
    );
    public $belongsTo = array(
        'Album' => array(
            'className' => 'Album',
            'foreignKey' => 'foreign_key',
        ),
    );

}
