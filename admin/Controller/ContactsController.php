<?php
/**
 * Description of ContactsController
 * @author : Trung Tong
 * @since Oct 15, 2012
 */
class ContactsController extends AppController {
    
    public $name = 'Contacts';
    public $uses = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Contact = $this->Contact->find('all', array(
            'order' => array('Contact.id DESC')
            ));
        $this->set('Contact', $Contact);
    }
    
    /**
     * editl support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__('Không tồn tại ', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->request->data)) {
            $data['Contact'] = $this->data['Contact'];
            if ($this->Contact->save($data['Contact'])) {
                 $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Bài viết này không sửa được vui lòng thử lại.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Contact->read(null, $id);
        }
        $edit = $this->Contact->findById($id);
        $this->set('edit', $edit);
    }

    /**
     * delete support
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Contact->delete($id)) {
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Danh mục không xóa được', true));
        $this->redirect(array('action' => 'index'));
    }
    
     //close danh muc
    function close($id = null) {
        $this->Contact->id = $id;
        $this->Contact->saveField('status', 0);
        $this->redirect(array('action' => 'index'));
    }

    // active danh muc
    function active($id = null) {
        $this->Contact->id = $id;
        $this->Contact->saveField('status', 1);
        $this->redirect(array('action' => 'index'));
    }

}