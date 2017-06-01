<?php

class Khoanggia extends AppModel {

    public $name = 'Khoanggia';
    public $actsAs = array('Tree');
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Xin vui lòng điền thông tin',
                'allowEmpty' => false,
                'required' => true
            ),
        ),
    );
    public $hasMany = array(
        'Product' =>
        array('className' => 'Product',
            'foreignKey' => 'khoanggia_id',
            'dependent' => true
        )
    );

}

?>
