<?php

App::import('Vendor', 'upload');

/**
 * Description of BannersController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class BannersController extends AppController {

    public $name = 'Banners';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach banner
     * Co the co nhieu banner va se hien thi banner nao duoc chon
     */
    public function index() {
        $banner = $this->Banner->find('all');
        $this->set('banner', $banner);
    }

    /**
     * Thêm banner
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Banner->create();
            $data['Banner'] = $this->data['Banner'];

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            $handle = new upload($_FILES['userfile']);
            if ($handle->uploaded) {

                // Neu resize
//                $handle->image_resize          = true;
//                $handle->image_ratio_y        = true;
//                $handle->image_x                 = 790;

                $filename = date('YmdHis') . md5(rand(10000, 99999));
                $handle->file_new_name_body = $filename;

                $handle->Process(IMAGES_URL . 'banner');
                if ($handle->processed) {
                    $img = $handle->file_dst_name;
                }
                $data['Banner']['images'] = $img;
            }
            
            if ($this->Banner->save($data['Banner'])) {
                $this->redirect("/banners");
            }
        }
    }

    /**
     * Edit banner
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Banner'] = $this->data['Banner'];
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'banner');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                    $data['Banner']['images'] = $img;
                }
            }

            if ($this->Banner->save($data['Banner'])) {
                $this->redirect(array('action' => 'index'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Banner->read(null, $id);
        }
        $this->set('edit', $this->Banner->findById($id));
    }

    /**
     * Select banner
     * update status = 1
     */
    public function selectBanner() {
        $chon = $_REQUEST['chon'];

        /**
         * update tat ca ve 0
         */
        $this->Banner->updateAll(array('Banner.status' => 0));

        /**
         * Update banner duoc chon
         */
        $this->Banner->updateAll(array('Banner.status' => 1), array('Banner.id' => $chon));
        $this->redirect("/banners");
    }
    
    // Xoa banner
    function delete($id = null) {
        if (empty($id)) {
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Banner->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->redirect(array('action' => 'index'));
    }

}