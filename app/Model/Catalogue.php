<?php

class Catalogue extends AppModel {

    public $name = 'Catalogue';
    public $displayField = 'name';
//    public $actsAs = array('Tree', 'Translate' => array('name'));
    public $actsAs = array('Tree');
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => true,
            ),
        ),
    );
    public $hasMany = array(
        'News' =>
        array('className' => 'News',
            'foreignKey' => 'cat_id',
            'dependent' => true
        ),
        'Product' => 
        array('className' => 'Product',
            'foreignKey' => 'cat_id',
            'dependent' => true
        )
    );

}

?>
