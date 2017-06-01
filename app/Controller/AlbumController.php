<?php

/**
 * Description of AlbumController
 * @author : Trung Tong
 * @since Jan 19, 2013
 */
class AlbumController extends AppController {

    public $name = 'Album';
    public $uses = array('Catalbum', 'Album', 'Video');

    public function index() {
        $gallery = $this->Catalbum->find('all', array(
            'conditions' => array(
                'Catalbum.status' => 1
            ),
            'order' => 'Catalbum.pos ASC'
        ));

        $tieude = $this->Catalbum->read(null, $gallery[0]['Catalbum']['id']);
        $this->set('tieude', $tieude);

        $detailAlbum = $this->Album->find('all', array(
            'Album.album_id' => $gallery[0]['Catalbum']['id']
        ));
        $this->set('detailAlbum', $detailAlbum);
        $this->render('viewalbum');
    }

    public function viewalbum($id = null) {
        // Ten dm
        $tieude = $this->Catalbum->read(null, $id);
        $this->set('tieude', $tieude);

        $detailAlbum = $this->Album->find('all', array(
            'conditions' => array(
                'Album.album_id' => $id
            ),
            'order' => 'Album.pos DESC, Album.id DESC'
        ));
        $this->set('detailAlbum', $detailAlbum);

        // Cac album khac
        $khac = $this->Catalbum->find('all', array(
            'conditions' => array(
                'Catalbum.id <>' => $id
            ),
        ));
        $this->set('khac', $khac);
    }

    public function video() {
        $video = $this->Video->find('all');
        $this->set('video', $video);
    }

    public function detailvideo($id = null) {
        $detailVideo = $this->Video->read(null, $id);
        $this->set('detailVideo', $detailVideo);

        // Cac video lien quan
        $video = $this->Video->find('all');
        $this->set('video', $video);
    }

}