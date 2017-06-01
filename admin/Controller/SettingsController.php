<?php

App::import('Vendor', 'ckeditor');
App::import('Vendor', 'ckfinder');

/**
 * Description of SettingsController
 * @author : Trung Tong
 * @since Oct 14, 2012
 */
class SettingsController extends AppController {

    public $name = 'Settings';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    public function index() {
        if (!empty($this->request->data)) {
            $data['Setting'] = $this->data['Setting'];
            if ($this->Setting->save($data['Setting'])) {
                $this->Session->setFlash(__('Bài viết sửa thành công', true));
                $this->redirect("/settings");
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Setting->read(null, 1);
        }
        $edit = $this->Setting->findById(1);
        $this->set('edit', $edit);
    }

}