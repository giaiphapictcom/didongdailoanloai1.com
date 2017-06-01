<?php

/**
 * Description of CommentController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class CommonController extends AppController {

    public $name = 'Common';
    public $uses = array('Catalogue', 'News', 'Slideshow', 'Banner', 'Setting', 'Advertisement', 'Catproduct', 'Product', 'Support', 'Post', 'Atribute');

    // Menu top
    public function menusp() {
        $mntop = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.parent_id' => 44
            ),
            'order' => 'Catalogue.pos ASC'
        ));
        return $mntop;
    }
	
	public function menutop() {
        $mntop = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.type' => 1,
				'Catalogue.parent_id' => ""
            ),
            'order' => 'Catalogue.pos ASC'
        ));
        return $mntop;
    }

    // Cac thong tin chung
    public function thongtin($id = NULL) {
        $info = $this->Post->read(null, $id);
        return $info;
    }
    
    // Danh sach thuoc tinh
    public function thuoctinh() {
        $att = $this->Atribute->find('threaded', array(
            'conditions' => array(
                'Atribute.status' => 1,
            ),
            'order' => 'Atribute.pos ASC'
        ));
        return $att;
    }

    // Banner
    public function banner() {
        $banner = $this->Banner->find('first', array(
            'conditions' => array(
                'Banner.status' => 1
            )
        ));
        return $banner;
    }

    // Menu footer
    public function menuft($id = NULL) {
        $mntop = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
                'Catalogue.parent_id' => $id
            ),
            'order' => 'Catalogue.pos ASC'
        ));
        return $mntop;
    }
	
	public function menuft1() {
        $mntop = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.status' => 1,
				'Catalogue.parent_id' => "",
                'Catalogue.type' => 2
            ),
            'order' => 'Catalogue.pos ASC'
        ));
        return $mntop;
    }
    
    public function  menutree() {
        return $this->Catalogue->generateTreeList(array('Catalogue.type' => 2), null, null, '-- ');;
    }

    // Tin hot
    public function tinhot() {
        $tinhot = $this->News->find('all', array(
            'conditions' => array(
                'News.status' => 1,
                'News.hot' => 1
            ),
            'order' => 'News.pos ASC',
            'limit' => 5
        ));
        return $tinhot;
    }

    public function intro() {
        $tinhot = $this->Post->find('all', array(
            'conditions' => array(
                'Post.status' => 1,
                'Post.id <>' => 1
            ),
            'order' => 'Post.pos ASC',
            'limit' => 4
        ));
        return $tinhot;
    }

    // Quang cao
    public function quangcao() {
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 1
            ),
            'order' => 'Advertisement.pos ASC'
        ));
        return $qcao;
    }
    
    public function quangcao1() {
        $qcao = $this->Advertisement->find('all', array(
            'conditions' => array(
                'Advertisement.status' => 0
            ),
            'order' => 'Advertisement.pos ASC'
        ));
        return $qcao;
    }

    public function video() {
        $qcao = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1
            ),
            'order' => 'Video.pos ASC'
        ));
        return $qcao;
    }

    // San pham moi
    public function spmoi() {
        $spm = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.new' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => 10
        ));
        return $spm;
    }

    // San pham home
    public function sphot() {
        $sphome = $this->Product->find('all', array(
            'conditions' => array(
                'Product.status' => 1,
                'Product.hot' => 1
            ),
            'order' => 'Product.pos ASC',
            'limit' => 10
        ));
        return $sphome;
    }

    // Cau hinh website
    public function setting() {
        $setting = $this->Setting->find('first');
        return $setting;
    }

    // SLide show
    public function slideshow() {
        $slideshow = $this->Slideshow->find('all', array('order' => 'Slideshow.pos ASC'));
        return $slideshow;
    }

    // Slide add
    public function slideadv() {
        $slideadv = $this->Advertisement->find('all', array('order' => 'Advertisement.pos ASC'));
        return $slideadv;
    }

    // Ho tro truc tuyen
    public function support() {
        $support = $this->Support->find('all', array('order' => 'Support.pos ASC'));
        return $support;
    }

    public function multiMenu($parentid = null, $trees = NULL) {
        $parmenu = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.parent_id' => $parentid,
                'Catalogue.status' => 1,
				'Catalogue.type' => 2
            ),
            'order' => 'Catalogue.pos ASC, Catalogue.id DESC'
        ));
        if (count($parmenu) > 0) {
            $trees .= '<ul>';
            foreach ($parmenu as $field) {
                if (strlen($field['Catalogue']['link']) > 3) {
                    $trees .= '<li><a href="' . DOMAIN . $field['Catalogue']['link'] . '">' . $field['Catalogue']['name'] . '</a>';
                } else {
                    if ($field['Catalogue']['type'] == 2) {
                        $trees .= '<li><a href="' . DOMAIN . $field['Catalogue']['slug']  . '-' . $field['Catalogue']['id'] . '.html">' . $field['Catalogue']['name'] . '</a>';
                    } else {
                        $trees .= '<li><a href="' . DOMAIN . $field['Catalogue']['id'] . '/' . $field['Catalogue']['slug']  . '.html">' . $field['Catalogue']['name'] . '</a>';
                    }
                }
                $trees = $this->multiMenu($field['Catalogue']['id'], $trees);
            }
            $trees .='</li></ul></li>';
        } else {
            $trees .='</li>';
        }
        $trees = str_replace("</li></li>", "</li>", $trees);
        return $trees;
    }

}