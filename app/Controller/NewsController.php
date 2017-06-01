<?php

/**
 * Description of NewsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class NewsController extends AppController {

    public $name = 'News';
    public $uses = array('News', 'Catalogue');

    public function index($id = null) {
        $groupId = $this->Catalogue->children($id);
        $arrId = array($id);
        foreach ($groupId as $values) {
            $arrId[] = $values['Catalogue']['id'];
        }

        // Tieu de danh muc
        $tieude = $this->Catalogue->read(null, $id);
        $this->set('tieude', $tieude);

        // Set Seo
        if ($tieude['Catalogue']['title_seo'] != "") {
            $this->set('title_for_layout', $tieude['Catalogue']['title_seo']);
        } else {
            $this->set('title_for_layout', $tieude['Catalogue']['name']);
        }
        $this->set('keywords_for_layout', $tieude['Catalogue']['meta_key']);
        $this->set('description_for_layout', $tieude['Catalogue']['meta_des']);

        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
                'News.cat_id' => $arrId
            ),
            'order' => 'News.pos DESC, News.modified DESC',
            'limit' => '5'
        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
    }

    public function listnews() {
        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1
            ),
            'order' => 'News.pos DESC, News.modified DESC',
            'limit' => '5'
        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
    }

    public function detail($id = null) {
        $detailNews = $this->News->findById($id);
        $this->set('detailNews', $detailNews);

        // Set Seo
        if ($detailNews['News']['title_seo'] != "") {
            $this->set('title_for_layout', $detailNews['News']['title_seo']);
        } else {
            $this->set('title_for_layout', $detailNews['News']['name']);
        }
        $this->set('keywords_for_layout', $detailNews['News']['meta_key']);
        $this->set('description_for_layout', $detailNews['News']['meta_des']);

        // Cac tin khac
        $tinkhac = $this->News->find('all', array(
            'conditions' => array(
                'News.id <>' => $id,
                'News.cat_id' => $detailNews['News']['cat_id']
            ),
            'order' => array('News.pos DESC', 'News.modified DESC'),
            'limit' => 10
        ));
        $this->set('tinkhac', $tinkhac);
        $tieude = $this->Catalogue->read(null, $detailNews['News']['cat_id']);
    }

    public function service($id = null) {
        $listNews = $this->News->find('all', array(
            'conditions' => array(
                'News.status' => 1,
                'News.cat_id' => 1
            )
        ));
        $this->set('listNews', $listNews);
    }

    public function partner() {
        
    }

    public function search() {
        $keyword = $this->request->data['searchProduct'];
        $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
                'News.name LIKE' => '%' . $keyword . '%'
            ),
            'order' => 'News.pos DESC, News.modified DESC',
            'limit' => '10'
        );
        $listNews = $this->paginate('News');
        $this->set('listNews', $listNews);
    }

}
