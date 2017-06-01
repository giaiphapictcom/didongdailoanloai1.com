<?php

/**
 * Description of CataloguesController
 * @author : Trung Tong
 * @since 12-10-2012
 */
App::import('Vendor', 'upload');

class CataloguesController extends AppController {

    public $name = 'Catalogues';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Catalogue = $this->Catalogue->find('all', array(
            'conditions' => array(
                'Catalogue.parent_id' => $id
            ),
            'order'      => array('Catalogue. pos ASC', 'Catalogue.id ASC')
        ));
        $this->set('Catalogue', $Catalogue);

        // List for combo box
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');

        // set ID
        $this->set('catId', $id);
        $this->set(compact('list_cat'));
    }

    /**
     * add catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function add($id = null) {
        if ($this->request->is('post')) {
            $this->Catalogue->create();
            $data = $this->request->data;

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
//            $handle = new upload($_FILES['userfile']);
//            if ($handle->uploaded) {
//
//                // Neu resize
////                $handle->image_resize          = true;
////                $handle->image_ratio_y        = true;
////                $handle->image_x                 = 790;
//
//                $filename                   = date('YmdHis') . md5(rand(10000, 99999));
//                $handle->file_new_name_body = $filename;
//
//                $handle->Process(IMAGES_URL . 'danhmuc');
//                if ($handle->processed) {
//                    $img = $handle->file_dst_name;
//                }
//                $data['Catalogue']['images'] = $img;
//            }

            $data['Catalogue']['parent_id'] = $data['Catalogue']['catId'];
            if ($this->Catalogue->save($data['Catalogue'])) {
                $this->redirect('/catalogues/index/' . $data['Catalogue']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Catalogue->read(null, $id));
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        $this->Catalogue->setLanguage('vie', 'eng');
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
             /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
//            $handle = new upload($_FILES['userfile']);
//            if ($handle->uploaded) {
//
//                // Neu resize
////                $handle->image_resize          = true;
////                $handle->image_ratio_y        = true;
////                $handle->image_x                 = 790;
//
//                $filename                   = date('YmdHis') . md5(rand(10000, 99999));
//                $handle->file_new_name_body = $filename;
//
//                $handle->Process(IMAGES_URL . 'danhmuc');
//                if ($handle->processed) {
//                    $img = $handle->file_dst_name;
//                }
//                $data['Catalogue']['images'] = $img;
//            }
            
            if ($this->Catalogue->save($data['Catalogue'])) {
                $this->redirect('/catalogues/index/' . $data['Catalogue']['catId']);
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Catalogue->read(null, $id);
        }
        $list_cat = $this->Catalogue->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit ting viet
//        $this->Catalogue->setLanguage('vie');
        $edit_vie = $this->Catalogue->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
//        $this->Catalogue->setLanguage('eng');
//        $edit_eng = $this->Catalogue->findById($id);
//        $this->set('edit_eng', $edit_eng);
    }

    /**
     * delete catalogues
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Catalogue->delete($id)) {
            $this->redirect($this->referer());
        }
        $this->redirect($this->referer());
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];
        $hot   = $_REQUEST['hot'];
        // Update order
        foreach ($vitri as $k => $v) {
            if ($v == "") {
                $v = null;
            }
            $this->Catalogue->updateAll(
                    array(
                'Catalogue.pos' => $v,
                'Catalogue.hot' => $hot[$k]
                    ), array('Catalogue.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Catalogue->id = $id;
        $this->Catalogue->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Catalogue->id = $id;
        $this->Catalogue->saveField('status', 1);
        $this->redirect($this->referer());
    }

}
