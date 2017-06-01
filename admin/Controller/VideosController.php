<?php

App::import('Vendor', 'upload');

/**
 * Description of VideosController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class VideosController extends AppController {

    public $name = 'Videos';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach video
     */
    public function index() {
        $video = $this->Video->find('all', array(
            'order' => 'Video.pos ASC'
            ));
        $this->set('video', $video);
    }

    /**
     * Thêm video
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Video->create();
            $data['Video'] = $this->data['Video'];

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            if (!empty($_FILES['userfile']['name'])) {
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {

                    // Neu resize
//                $handle->image_resize          = true;
//                $handle->image_ratio_y        = true;
//                $handle->image_x                 = 790;

                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'video');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }

                $data['Video']['src'] = $img;
            }

            if ($this->Video->save($data['Video'])) {
                $this->Session->setFlash(__('Thêm mới video thành công', true));
                $this->redirect("/videos");
            } else {
                $this->Session->setFlash(__('Thêm video thất bại. Vui long thử lại', true));
            }
        }
    }

    /**
     * Edit video
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Video'] = $this->data['Video'];
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {
                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'logo');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                }
            } else {
                $img = $_REQUEST['oldimg'];
            }

            $data['Video']['src'] = $img;
            $data['Video']['modified'] = date('Y-m-d');
            if ($this->Video->save($data['Video'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Video->read(null, $id);
        }
        $this->set('edit', $this->Video->findById($id));
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Video->updateAll(
                array(
                'Video.pos' => $v
                ), array(
                'Video.id' => $k)
            );
        }
        $this->redirect(array('action' => 'index'));
    }

    // Xoa quang cao
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Video->delete($id)) {
            $this->Session->setFlash(__('Xóa bài viết thành công', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }

    //close quang cao
    function close($id = null) {
        $this->Video->id = $id;
        $this->Video->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active quang cao
    function active($id = null) {
        $this->Video->id = $id;
        $this->Video->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}
