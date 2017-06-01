<?php

/**
 * Description of HoadonsController
 * @author : Trung Tong
 * @since Jan 16, 2013
 */
class HoadonsController extends AppController {

    public $name = 'Hoadons';
    public $uses = array('Usercatproduct', 'User', 'Product', 'Hoadon', 'Hanghoa', 'Agent', "Customer");

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $this->redirect('/');
        }
    }

    public function index() {
        $listbill = $this->Hoadon->find('all', array(
            'fields' => array(
                'Hoadon.id',
                'Customer.name',
                'Customer.phone',
                'Customer.email',
                'Hoadon.created'
            ),
            'joins' => array(
                array(
                    'table' => 'customers',
                    'alias' => 'Customer',
                    'type' => 'left',
                    'conditions' => array(
                        'Hoadon.customer_id = Customer.id'
                    )
                )
            ),
            'order' => 'Hoadon.created DESC'
            ));
        $this->set('listbill', $listbill);
    }

    /**
     * Xoa hoa don
     */
    public function deletebill($id = null) {
        $uid = $this->Session->read("uid");
        $this->Hoadon->id = $id;
        $ckccat = $this->Hoadon->read();
        if ($ckccat['Hoadon']['user_id'] != $uid) {
            $this->redirect('/users/bills');
        }
        if ($this->Hoadon->delete($id)) {
            // Xoa luon trong mon an
            $this->Hanghoa->deleteAll(array('Hanghoa.hoadon_id' => $id));
            $this->redirect($this->referer());
        }
    }

    /**
     * Chi tiet hoa don
     */
    public function viewbill($id) {
        // Chi tiet khach hang
        $hoadon = $this->Hoadon->read(null, $id);
        $this->set('hoadon', $hoadon);

        // Thong tin khach hang
        $khachhang = $this->Agent->read(null, $hoadon['Hoadon']['agent_id']);
        $this->set('khachhang', $khachhang);

        $khachhang1 = $this->Customer->read(null, $hoadon['Hoadon']['customer_id']);
        $this->set('khachhang1', $khachhang1);

        // Chi tiet hoa don
        $hanghoa = $this->Hanghoa->find('all', array(
            'fields' => array(
                'Hanghoa.*', 'Product.name'
            ),
            'conditions' => array(
                'Hanghoa.hoadon_id' => $id
            ),
            'joins' => array(
                array(
                    'table' => 'products',
                    'alias' => 'Product',
                    'type' => 'inner',
                    'conditions' => array(
                        'Hanghoa.product_id = Product.id'
                    )
                )
            ),
            'order' => 'Hanghoa.id ASC'
            ));
        $this->set('hanghoa', $hanghoa);
    }

}