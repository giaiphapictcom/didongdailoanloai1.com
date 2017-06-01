<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public function beforeRender() {
        $this->_setErrorLayout();
    }

    public function _setErrorLayout() {
        if ($this->name == 'CakeError') {
            $this->redirect(DOMAIN);
            $this->layout = 'error';
        }
    }

}
