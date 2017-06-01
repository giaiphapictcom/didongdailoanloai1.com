<?php

App::import('Vendor', 'upload');

/**
 * Description of SlideshowsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class SlideshowsController extends AppController {

    public $name = 'Slideshows';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sach slide show
     */
    public function index() {
        $advs = $this->Slideshow->find('all', array(
            'order' => 'Slideshow.pos ASC'
        ));
        $this->set('advs', $advs);
    }

    /**
     * Thêm slide show
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Slideshow->create();
            $data = $this->request->data;

            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            $handle = new upload($_FILES['userfile']);
            if ($handle->uploaded) {

                // Neu resize
                $handle->image_resize = true;
                $handle->image_x = 1174;
                $handle->image_y = 418;

                $filename = date('YmdHis') . md5(rand(10000, 99999));
                $handle->file_new_name_body = $filename;

                $handle->Process(IMAGES_URL . 'slide');
                if ($handle->processed) {
                    $img = $handle->file_dst_name;
                }
                $data['Slideshow']['images'] = $img;
            }

            if ($this->Slideshow->save($data['Slideshow'])) {
                $this->redirect("/slideshows");
            }
        }
    }

    /**
     * Edit slide show
     * @author Trung Tong
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            if ($_FILES['userfile']['name'] != "") {
                // Upload anh
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {

                    // Neu resize
                    $handle->image_resize = true;
                    $handle->image_x = 1174;
                    $handle->image_y = 418;

                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'slide');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                    $data['Slideshow']['images'] = $img;
                }
            }

            if ($this->Slideshow->save($data['Slideshow'])) {
                $this->redirect(array('action' => 'index'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Slideshow->read(null, $id);
        }
        $this->set('edit', $this->Slideshow->findById($id));
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Slideshow->updateAll(
                    array(
                'Slideshow.pos' => $v
                    ), array(
                'Slideshow.id' => $k)
            );
        }
        $this->redirect(array('action' => 'index'));
    }

    // Xoa slide show
    function delete($id = null) {
        if (empty($id)) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Slideshow->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->redirect(array('action' => 'index'));
    }

    //close slide show
    function close($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active slide show
    function active($id = null) {
        $this->Slideshow->id = $id;
        $this->Slideshow->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}