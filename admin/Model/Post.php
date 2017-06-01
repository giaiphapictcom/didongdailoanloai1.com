<?php

class Post extends AppModel {

    public $name = 'Post';
    public $displayField = 'name';
//	public $actsAs = array('Translate' => array('name', 'content'), 'Sluggable' => array('label' => 'name'));
    public $actsAs = array('Sluggable' => array('label' => 'name'));

}

?>
