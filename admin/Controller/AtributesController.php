<?php

/**
 * Description of AtributesController
 * @author : Trung Tong
 * @since 12-10-2012
 */

class AtributesController extends AppController {

    public $name = 'Atributes';
    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    /**
     * List all Atributes
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    public function index($id = null) {
        $Atribute = $this->Atribute->find('all', array(
            'conditions' => array(
                'Atribute.parent_id' => $id
            ),
            'order'      => array('Atribute. pos ASC', 'Atribute.id ASC')
        ));
        $this->set('Atribute', $Atribute);

        // List for combo box
        $list_cat = $this->Atribute->generateTreeList(null, null, null, '-- ');

        // set ID
        $this->set('catId', $id);
        $this->set(compact('list_cat'));
    }

    /**
     * add Atributes
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function add($id = null) {
        if ($this->request->is('post')) {
            $this->Atribute->create();
            $data = $this->request->data;

            $data['Atribute']['parent_id'] = $data['Atribute']['catId'];
            if ($this->Atribute->save($data['Atribute'])) {
                $this->redirect('/Atributes/index/' . $data['Atribute']['catId']);
                exit;
            }
        }
        $this->set('tendm', $this->Atribute->read(null, $id));
        $list_cat = $this->Atribute->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));
        $this->set('catId', $id);
    }

    /**
     * editl Atributes
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function edit($id = null) {
        $this->Atribute->setLanguage('vie', 'eng');
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            if ($this->Atribute->save($data['Atribute'])) {
                $this->redirect('/Atributes/index/' . $data['Atribute']['catId']);
            }
        }
        if (empty($this->request->data)) {
            $this->data = $this->Atribute->read(null, $id);
        }
        $list_cat = $this->Atribute->generateTreeList(null, null, null, '-- ');
        $this->set(compact('list_cat'));

        // Edit ting viet
//        $this->Atribute->setLanguage('vie');
        $edit_vie = $this->Atribute->findById($id);
        $this->set('edit_vie', $edit_vie);

        // Edit tieng anh
//        $this->Atribute->setLanguage('eng');
//        $edit_eng = $this->Atribute->findById($id);
//        $this->set('edit_eng', $edit_eng);
    }

    /**
     * delete Atributes
     * @author : Trung Tong
     * @param $id : id in table catproduct
     */
    function delete($id = null) {
        if (empty($id)) {
            $this->Session->setFlash(__('Không tồn tại danh mục này', true));
            $this->redirect($this->referer());
        }
        if ($this->Atribute->delete($id)) {
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
            $this->Atribute->updateAll(
                    array(
                'Atribute.pos' => $v,
                'Atribute.hot' => $hot[$k]
                    ), array('Atribute.id' => $k));
        }
        $this->redirect($this->referer());
    }

    //close danh muc
    function close($id = null) {
        $this->Atribute->id = $id;
        $this->Atribute->saveField('status', 0);
        $this->redirect($this->referer());
    }

    // active danh muc
    function active($id = null) {
        $this->Atribute->id = $id;
        $this->Atribute->saveField('status', 1);
        $this->redirect($this->referer());
    }

}
