<?php

class Product extends AppModel {

    public $name = 'Product';
    public $displayField = 'name';
//    public $actsAs = array('Translate' => array('name', 'shortdes', 'content'));

    public $belongsTo = array(
        'Catalogue' => array(
            'className' => 'Catalogue',
            'foreignKey' => 'cat_id'
        )
    );

}

?>
