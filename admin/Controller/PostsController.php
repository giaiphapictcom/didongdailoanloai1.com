<?php

App::import('Vendor', 'upload');
App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of PostsController
 * @author : Trung Tong
 * @since Oct 19, 2012
 */
class PostsController extends AppController {

    public $name = 'Posts';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * Danh sách sản phẩm
     * @author Trung Tong
     */
    function index() {
        $this->paginate = array(
            'order' => 'Post.pos ASC, Post.modified DESC',
            'limit' => '10'
        );
        $listPost = $this->paginate('Post');
        $this->set('listPosts', $listPost);

        // Tang so thu tu * limit (example : 10)
        $urlTmp = DOMAINAD . $this->request->url;
        $urlTmp = explode(":", $urlTmp);
        if (isset($urlTmp[2])) {
            $startPage = ($urlTmp[2] - 1) * 10 + 1;
        } else {
            $startPage = 1;
        }
        $this->set('startPage', $startPage);
    }

    /**
     * Change position
     * @author Trung -Tong
     */
    function changepos() {
        $vitri = $_REQUEST['order'];

        // Update order
        foreach ($vitri as $k => $v) {
            $this->Post->updateAll(
                    array(
                'Post.pos' => $v
                    ), array(
                'Post.id' => $k)
            );
        }
        $this->redirect('/posts');
    }

    /**
     * Thêm sản phẩm
     * @author Trung Tong
     */
    function add() {
        if (!empty($this->request->data)) {
            $this->Post->create();
            $data = $this->request->data;
            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            $handle = new upload($_FILES['userfile']);
            if ($handle->uploaded) {

                // Neu resize
//                $handle->image_resize = true;
//                $handle->image_x = 251;
//                $handle->image_y = 276;

                $filename = date('YmdHis') . md5(rand(10000, 99999));
                $handle->file_new_name_body = $filename;

                $handle->Process(IMAGES_URL . 'news');
                if ($handle->processed) {
                    $img = $handle->file_dst_name;
                }
                $data['Post']['images'] = $img;
            }
            if ($this->Post->save($data['Post'])) {
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            /**
             * Upload file tuy bien
             * @author : Trung Tong
             */
            if ($_FILES['userfile']['name'] != "") {
                $handle = new upload($_FILES['userfile']);
                if ($handle->uploaded) {

                    // Neu resize
//                $handle->image_resize = true;
//                $handle->image_x = 251;
//                $handle->image_y = 276;

                    $filename = date('YmdHis') . md5(rand(10000, 99999));
                    $handle->file_new_name_body = $filename;

                    $handle->Process(IMAGES_URL . 'news');
                    if ($handle->processed) {
                        $img = $handle->file_dst_name;
                    }
                    $data['Post']['images'] = $img;
                }
            }

            if ($this->Post->save($data['Post'])) {
                $this->redirect(array('action' => 'index'));
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Post->read(null, $id);
        }
        // Edit tieng viet
        //$this->Post->setLanguage('vie');
        $edit_vie = $this->Post->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
//        $this->Post->setLanguage('eng');
//        $edit_eng = $this->Post->findById($id);
//        $this->set('edit_eng', $edit_eng);
    }

    //close bai viet
    function close($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 0);
        $this->redirect('/posts');
    }

    // active bai viet
    function active($id = null) {
        $this->Post->id = $id;
        $this->Post->saveField('status', 1);
        $this->redirect('/posts');
    }

    // Xoa cac dang
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại bài viết này', true));
            //$this->redirect(array('action'=>'index'));
        }
        if ($this->Post->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Bài viết không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }

}