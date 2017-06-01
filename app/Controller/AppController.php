<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $uses = array('Setting');

    public function beforeFilter() {
        // $this->_setErrorLayout();
        if (isset($this->params->query['language'])) {
            $lang = $this->params->query['language'];
            $this->Session->write('language', $lang);
        }

        //set language
        if ($this->Session->read('language') == 'vie' || $this->Session->read('language') == "") {
            Configure::write('Config.language', 'vie');
        } else {
            Configure::write('Config.language', $this->Session->read('language'));
        }

        $setting = $this->Setting->find('first');
        $this->set('setting', $setting);
    }

    public function _setErrorLayout() {
        if ($this->name == 'CakeError') {
            $this->redirect('/');
            $this->layout = 'error';
        }
    }
}
