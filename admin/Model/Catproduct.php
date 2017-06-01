<?php

class Catproduct extends AppModel {

    public $name = 'Catproduct';
    public $displayField = 'name';
//    public $actsAs = array('Tree', 'Translate' => array('name'), 'Sluggable' => array('label' => 'name'));
    public $actsAs = array('Tree', 'Sluggable' => array('label' => 'name'));
    public $belongsTo = array(
        'ParentCat' => array(
            'className' => 'Catproduct',
            'foreignKey' => 'parent_id'
        )
    );
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
        'Product' =>
        array('className' => 'Product',
            'foreignKey' => 'cat_id',
            'dependent' => true,
            'exclusive' => false
        )
    );

}

?>
