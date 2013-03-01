<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class ManageController extends AdminController {
	
	protected $list_url = 'admin/manage';
	
    function edit() {

        if ( ! $this->MManage->isLogin() )
            $this->response->redirect('admin/login');

        $row = array();
        $row['manage_id']   = $this->MManage->getId();
        $row['manage_user'] = $this->MManage->getUser();

        $data = array();
        $data['action'] = 'doEdit';
        $data['row']    = $row;
        $this->load->viewAdmin('manage_edit', $data);
    }


    function doEdit() {
        $data = $this->getDoData();
        $id   = $this->manage_id;

        if ( ! empty($this->error) )
            $this->Message->failure( $this->error, site_url( 'admin/manage-edit' ) );

        if ( $id > 0 AND
                $this->MManage->getCounts(array('manage_id='.$id)) > 0 AND
                $this->MManage->save($data, 'UPDATE', $id) ) {

            $message = "管理员：{$data['manage_user']}<br />成功编辑！";
            $buttons = array('继续编辑' => site_url('admin/manage-edit'), '后台主页' => site_url('admin/landing'));
            $return  = site_url('admin/system');
            $this->Message->success($message, $buttons, $return);
        }
    }

    private function getDoData() {
        $this->manage_id = intval($this->request->post['manage_id']);
        $manage_user     = trim($this->request->post['manage_user']);
        $manage_pass     = $this->request->post['manage_pass'];
        $manage_pass2    = $this->request->post['manage_pass2'];

        $this->error = array();

        if ( ! $this->Form->isUserName($manage_user) )
            $this->error[] = "请输入一个4-20位长度的用户名。";
        
        $data = array();
        if ( $this->Form->isPassword( $manage_pass ) AND $manage_pass == $manage_pass2 ) {
            $data['manage_pass'] = md5( $manage_pass );
        } else {
            $this->error[] = "请保证密码长度6-20位，并且密码和确认密码一致。";
        }

        $data['manage_user']   = $manage_user;
        return $data;
    }
}

?>