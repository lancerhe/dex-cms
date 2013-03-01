<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class AdminController extends Controller {

    protected $list_url;
    protected $back_url;

    function __construct() {
        parent::__construct();

        $this->load->model('MManage');
        if ( ! $this->MManage->isLogin() )
            $this->response->redirect('admin/login');

        $this->load->library('Message');
        $this->load->library('Form');

        if ( $this->request->server('HTTP_REFERER') ) {
            $this->back_url = $this->request->server('HTTP_REFERER');
        } else {
            $this->back_url = site_url($this->list_url);
        }
    }

    protected function _getLoseData() {
        if ( isset($_SESSION['Dex_Oparation']) AND is_array($_SESSION['Dex_Oparation']) ) 
            return $_SESSION['Dex_Oparation'];

        return NULL;
    }

    protected function _setLoseData($data=NULL) {
        $_SESSION['Dex_Oparation'] = $data;
    }

    protected function _backtoList() {
        $this->response->redirect($this->list_url);
    }

    protected function _getPostIds() {
        $ids = $this->request->post('id');
        if ( ! is_array($ids) OR empty($ids)) {
            $this->_backtoList();
        }
        $data = array();
        foreach ($ids AS $id) {
            $data[] = intval($id);
        }
        return $data;
    }

    protected function _showSuccess($message='', $return='') {
        if ( ! $message )
            $message = '<p class="text-success">执行操作成功。</p>';

        if ( ! $return ) {
            if ( $this->request->server('HTTP_REFERER') ) {
                $return = $this->request->server('HTTP_REFERER');
            }
        }

        if ( ! $return ) {
            $return  = site_url($this->list_url);
        }

        $buttons = array('返回继续' => $return);
        $this->Message->success($message, $buttons, $return);
    }

    protected function _showFailure($message='', $return='') {
        if ( ! $message )
            $message = '<p class="text-error">数据异常错误，请联系管理员检查URL参数或链接是否异常。</p>';

        if ( ! $return ) {
            if ( $this->request->server('HTTP_REFERER') ) {
                $return = $this->request->server('HTTP_REFERER');
            }
        }

        if ( ! $return ) {
            $return  = site_url($this->list_url);
        }

        $this->Message->failure($message, $return);
    }

    function index() {
        $this->_setLoseData();
    }
}
?>