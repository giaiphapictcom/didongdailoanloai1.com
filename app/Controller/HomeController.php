<?php

/**
 * Description of HomeComtroller
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class HomeController extends AppController {

    public $name = 'Home';
    public $uses = array('Setting', 'Product', 'Catalogue', 'News', 'Post');

    public function beforeFilter() {
        parent::beforeFilter();
        $setting = $this->Setting->find('first');
        $this->set('title_for_layout', $setting['Setting']['title']);
        $this->set('keywords_for_layout', $setting['Setting']['meta_key']);
        $this->set('description_for_layout', $setting['Setting']['meta_des']);
    }

    public function introduction() {
        $detailAlbum = $this->Album->find('all');
        $this->set('detailAlbum', $detailAlbum);
        // Gioi thieu
        $gioithieu   = $this->Post->find('first');
        $this->set('gioithieu', $gioithieu);
    }

    public function intro($id = null) {
        // Gioi thieu
        $gioithieu = $this->News->read(null, 12);
        $this->set('gioithieu', $gioithieu);
    }

    public function index() {
        $this->layout = 'home';
        
        // Gioi thieu
        $gioithieu = $this->News->read(null, 12);
        $this->set('gioithieu', $gioithieu);

        // Tin tuc
        $spHome = array();
        $sp1    = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.type'   => 2,
                'Catalogue.hot'    => 1
            ),
            'order'      => 'Catalogue.pos ASC, Catalogue.id DESC'
        ));
        foreach ($sp1 as $row) {
            $groupId = $this->Catalogue->children($row['Catalogue']['id']);
            $arrId   = array($row['Catalogue']['id']);
            foreach ($groupId as $values) {
                $arrId[] = $values['Catalogue']['id'];
            }
            $sp2      = $this->Product->find('all', array(
                'conditions' => array(
                    'Product.hot'    => 1,
                    'Product.cat_id' => $arrId
                ),
                'order'      => 'Product.pos DESC, Product.id DESC',
                'limit'      => 15
            ));
            $menucon  = $this->Catalogue->find('all', array(
				'conditions' => array(
                    'Catalogue.status'    => 1,
                    'Catalogue.parent_id' => $row['Catalogue']['id']
                ),
                'order'      => 'Catalogue.pos ASC, Catalogue.id DESC'
            ));
            $spHome[] = array(
                'dm'    => $row,
                'mncon' => $menucon,
                'sp'    => $sp2
            );
        }

        $this->set('spHome', $spHome);
    }

    public function thuvienanh() {
        $detailAlbum = $this->Album->find('all');
        $this->set('detailAlbum', $detailAlbum);
    }

}
