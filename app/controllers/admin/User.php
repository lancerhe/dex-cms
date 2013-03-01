<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class UserController extends AdminController {

	protected $list_url = 'admin/user';
	
    private $filter = array(
        'user_name'  =>'用户名',
        'user_email' =>'邮件地址',
    );
    private $order  = array(
        'user_regdate-asc' => '注册时间升序',
        'user_regdate-desc'=> '注册时间降序'
    );
    
    private $user_status_array = array(
        0 => '待审核', 
        1 => '已验证'
    );
    
    function __construct() {
        parent::__construct();
        $this->load->model('MUser');
    }
    
    
    function index() {
        parent::index();

        $current_page = intval($this->request->get['page']);
        $current_page = $current_page > 1 ? $current_page : 1;

        $page_size = 10;
        
        $filter = $this->request->get['filter'];
        $keyword= $this->request->get['keyword'];
        $order  = $this->request->get['order'];
        $where  = $orderby = array();
        if ( array_key_exists($filter, $this->filter) ) {
            $where[] = "$filter LIKE '%{$keyword}%'";
        }
        if ( array_key_exists($order, $this->order)) {
            $temp = explode('-', $order);
            $orderby[] = "{$temp[0]} {$temp[1]}";
        }
        $total = $this->MUser->getCounts($where, $orderby);
        

        
        $this->load->library('AdminPage');
        $this->AdminPage->setCurrentPage($current_page);
        $this->AdminPage->setPageSize($page_size);
        $this->AdminPage->setTotalNum($total);
        $page = $this->AdminPage->output();
        $rows = $this->MUser->getRows($where, $orderby, $current_page, $page_size)->rows;
        
        $data   = array();
        $data['page'] = $page;
        $data['rows'] = $rows;
        $data['keyword'] = $keyword;
        $data['filter']  = $this->Form->setOption($this->filter, $filter, TRUE, FALSE);
        $data['order']   = $this->Form->setOption($this->order, $order, TRUE, FALSE);
        $this->load->viewAdmin('user_list', $data);
    }

    function audit() {
        $ids = $this->setPostIds();
        if ( $this->MUser->update(array('user_confirm'=>1), $ids) ) {
            $this->showSuccess("用户审核成功！", $this->request->post['url']);
        }
    }
    
    function unaudit() {
        $ids = $this->setPostIds();
        if ( $this->MUser->update(array('user_confirm'=>0), $ids) ) {
            $this->showSuccess("用户审核取消成功！", $this->request->post['url']);
        }
    }
    
    function del() {
        $ids = $this->setPostIds();
        
        if ($this->MUser->del($ids)) {
            $this->showSuccess("删除添加！", $this->request->post['url']);
        }
    }
    
    function add() {
        $data = array();
        if ( isset($_SESSION['Dex_Oparation']) ) {
            $row = $_SESSION['Dex_Oparation'];
        } else {
            $row = array();
        }

        $data['action'] = 'doAdd';
        $data['row']    = $row;
        $data['status'] = $this->Form->setOption($this->user_status_array, 0, TRUE, FALSE);
        $this->load->viewAdmin('user_edit', $data);
    }
    
    
    function edit() {
        $id = intval($this->request->get['id']);

        if ( ! $id )
            $this->response->redirect($this->list_url);

        if ( isset($_SESSION['Dex_Oparation']) ) {
            $row = $_SESSION['Dex_Oparation'];
        } else {
            $rows = $this->MUser->getRow($id);
            if ( ! is_array($rows->one))
                $this->response->redirect($this->list_url);

            $row = $rows->one;
        }

        $data = array();

        $data['action'] = 'doEdit';
        $data['row']    = $row;
        $data['status'] = $this->Form->setOption($this->user_status_array, $row['user_confirm'], TRUE, FALSE);
        $this->load->viewAdmin('user_edit', $data);
    }

    function view() {
        $id = intval($this->request->get['id']);

        if ( ! $id )
            $this->response->redirect($this->list_url);

        $rows = $this->MUser->getRow($id);

        if ( ! is_array($rows->one))
            $this->response->redirect($this->list_url);

        $data = array();
        $data['row']    = $rows->one;
        $this->load->viewAdmin('User_View', $data);
    }

    function doAdd() {
        $data = $this->getDoData();

        if ( ! empty($this->error) )
            $this->Message->failure( $this->error, site_url('admin/user-add') );

        if ( $this->MUser->save($data) ) {
            if (isset($_SESSION['Dex_Oparation']))
                unset($_SESSION['Dex_Oparation']);
            
            $message = "用户：{$data['user_email']}<br />成功添加！";
            $buttons = array('继续添加' => site_url('admin/user-add'), '返回列表' => site_url($this->list_url));
            $return  = site_url($this->list_url);
            $this->Message->success($message, $buttons, $return);
        }
    }

    function doEdit() {
        $data = $this->getDoData();
        $id   = $this->user_id;

        if ( ! empty($this->error) )
            $this->Message->failure( $this->error, site_url('admin/user-edit&id='.$this->user_id) );

        if ( $id > 0 AND
                $this->MUser->getCounts(array('user_id='.$id)) > 0 AND
                $this->MUser->save($data, 'UPDATE', $id) ) {
            if (isset($_SESSION['Dex_Oparation']))
                unset($_SESSION['Dex_Oparation']);
            
            $message = "用户：{$data['user_email']}<br />成功编辑！";
            $buttons = array('继续编辑' => site_url('admin/user-edit&id='.$id), '返回列表' => site_url($this->list_url));
            $return  = site_url($this->list_url);
            $this->Message->success($message, $buttons, $return);
        }
    }

    private function getDoData() {
        $this->user_id = intval($this->request->post['user_id']);

        $user_email    = trim($this->request->post['user_email']);
        $user_name     = trim($this->request->post['user_name']);
        $user_pass     = $this->request->post['user_pass'];
        $user_pass2    = $this->request->post['user_pass2'];

        $_SESSION['Dex_Oparation'] = $_POST;

        $this->error = array();

        if ( ! $this->Form->isUserName($user_name) )
            $this->error[] = "请输入一个4-20位长度的用户名。";
        else {
            $num = $this->MUser->getCounts(array("user_name='{$user_name}'", "user_id!={$this->user_id}"));
            if ( $num > 0) {
                $this->error[] = "该用户名[{$user_name}]已存在。";
            }
        }
        
        if ( ! $this->Form->isEmail($user_email) )
            $this->error[] = "请输入一个有效的邮件地址格式。";
        else {
            $num = $this->MUser->getCounts(array("user_email='{$user_email}'", "user_id!={$this->user_id}"));
            if ( $num > 0) {
                $this->error[] = "该Email地址[{$user_email}]已存在。";
            }
        }

        $data = array();
        if ( ! ( $this->user_id > 0 AND empty($user_pass) ) ) {
            if ( $this->Form->isPassword($user_pass) AND $user_pass == $user_pass2 ) {
                $data['user_pass'] = md5( $user_pass );
            } else {
                $this->error[] = "请保证密码长度6-20位，并且密码和确认密码一致。";
            }
        }

        $data['user_name']   = $user_name;
        $data['user_email']  = $user_email;
        $data['user_confirm']= intval($this->request->post['user_confirm']);
        $data['user_regdate']= strtotime($this->request->post['user_regdate']);
        if ( ! $this->user_id ) {
            $data['user_findcode'] = md5($user_email . time());
        }
        return $data;
    }
}

?>