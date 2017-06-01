<?php

class Product extends AppModel {

    public $name = 'Product';
    public $displayField = 'name';
//    public $actsAs = array('Translate' => array('name', 'shortdes', 'content'), 'Sluggable' => array('label' => 'name'));
     public $actsAs = array('Sluggable' => array('label' => 'name'));

    public $belongsTo = array(
        'Catalogue' => array(
            'className' => 'Catalogue',
            'foreignKey' => 'cat_id'
        )
    );

}

?>
