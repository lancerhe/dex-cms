<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class LoginController extends Controller {
    
    private $login_url = '/admin/login';
    private $admin_url = '/admin/main';
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title']      = '后台管理系统 - 登陆';
        $data['is_captcha'] = $this->_hasCaptcha() ? 1 : 0;
        $this->load->view('admin/login' ,$data);
    }

    function logout() {
        $this->load->model('MManage');
        $this->MManage->logout();
        $this->response->redirect( $this->login_url );
    }

    function check() {

        $username = $this->request->post('username');
        $password = md5($this->request->post('password'));
        $captcha  = strtolower($this->request->post('captcha'));

        if ( $this->_hasCaptcha() AND $captcha != $_SESSION['Captcha']['Login']) {
            $this->response->redirect( $this->login_url );
        }

        if ( ! $username OR ! $password) {
            $this->_setCaptcha();
            $this->response->redirect( $this->login_url );
        }

        $this->load->model('MManage');

        if ( ! $this->MManage->isAccount($username, $password)) {
            $this->_setCaptcha();
            $this->response->redirect( $this->login_url );
        } else {
            $this->MManage->login();
            unset( $_SESSION['Captcha']['Login_Need'] );
            $this->response->redirect( $this->admin_url );
        }
    }

    function code($rand=0) {
        ob_clean();

        $this->load->library('Captcha');
        $this->Captcha->setSessionKey('Login');
        $this->Captcha->create();
    }

    private function _setCaptcha() {
        $_SESSION['Captcha']['Login_Need'] = 1;
    }

    private function _hasCaptcha() {
        if ($_SESSION['Captcha']['Login_Need'] AND $_SESSION['Captcha']['Login_Need'] == 1)
            return TRUE;

        return FALSE;
    }
}