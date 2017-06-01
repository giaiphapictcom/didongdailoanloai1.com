<?php

class News extends AppModel {

    public $name = 'News';
    public $displayField = 'name';
//    public $actsAs = array('Translate' => array('name', 'shortdes', 'content'));
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => false,
            ),
        )
    );
    public $belongsTo = array(
        'Catalogue' => array(
            'className' => 'Catalogue',
            'foreignKey' => 'cat_id'
        )
    );

}

?>
