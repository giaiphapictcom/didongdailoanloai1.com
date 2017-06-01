<?php

class Atribute extends AppModel {

    public $name = 'Atribute';
    public $displayField = 'name';
//    public $actsAs = array('Tree', 'Translate' => array('name'), 'Sluggable' => array('label' => 'name'));
    public $actsAs = array('Tree', 'Sluggable' => array('label' => 'name'));


}

?>
