<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class LinkController extends AdminController {

	protected $list_url = 'admin/link';
	
    private $link_status_array = array(
        0 => '已关闭', 
        1 => '已开启'
    );
    
    private $link_type_array = array(
        'T' => '文本',
        'I' => '图片'
    );
    
    private $link_target_array = array(
        '_blank'  => '新窗口打开',
        '_self'   => '自身打开'
    );
    
	
    function __construct() {
        parent::__construct();
        $this->load->model('MLink');
    }
    
    
    function upload() {
        $upload = array($this->request->files('link_file'));
        $this->load->library('Upload', $upload );
        $this->Upload->file_new_name_body = date('YmdHis', mktime());

        $this->Upload->process( UPFILE_PATH . 'link/');
        $img_url = '/upload/link/' . $this->Upload->file_dst_name;
	    ob_clean();
        echo json_encode(array('url' => $img_url) );
        exit();
    }
    
    
    function index() {
        parent::index();

        $rows = $this->MLink->getRows(array(), array('link_order DESC'))->rows;
        
        $data   = array();
        $data['rows'] = $rows;
        $this->load->viewAdmin('link_list', $data);
    }


    function audit() {
        $ids = $this->setPostIds();
        if ( $this->MLink->update(array('link_status'=>1), $ids) ) {
            $this->showSuccess("链接投放成功！", $this->request->post['url']);
        }
    }
    
    
    function unaudit() {
        $ids = $this->setPostIds();
        if ( $this->MLink->update(array('link_status'=>0), $ids) ) {
            $this->showSuccess("链接关闭成功！", $this->request->post['url']);
        }
    }
    
    function del() {
        $ids = $this->setPostIds();
        
        if ($this->MLink->del($ids)) {
            $this->showSuccess("链接删除添加！", $this->request->post['url']);
        }
    }
    
    function add() {
        $data = array();
        $row = $this->_getLoseData();

        if ( is_null($row) ) {
            $row = array();
        }

        $data['row']         = $row;
        $data['link_type']   = $this->Form->setOption($this->link_type_array, $row['link_type']);
        $data['link_status'] = $this->Form->setOption($this->link_status_array, $row['link_status']);
        $data['link_target'] = $this->Form->setOption($this->link_target_array, $row['link_target']);
        $this->load->viewAdmin('link_edit', $data);
    }
    
    
    function edit() {
        $id = intval($this->request->get('id'));

        if ( ! $id )
            $this->backtoList();

        $row = $this->_getLoseData();

        if ( is_null($row) ) {
            $row = $this->MLink->getRowById($id);
            if ( ! $row )
                $this->showFailure('不存在信息');
        }
        $data = array();

        $data['row']         = $row;
        $data['link_type']   = $this->Form->setOption($this->link_type_array, $row['link_type']);
        $data['link_status'] = $this->Form->setOption($this->link_status_array, $row['link_status']);
        $data['link_target'] = $this->Form->setOption($this->link_target_array, $row['link_target']);
        $this->load->viewAdmin('link_edit', $data);
    }

    function save() {
        $id = intval($this->request->post('link_id'));

        $this->_setLoseData($_POST);
        $this->error = array();

        $data = array();
        $data['link_text']   = trim($this->request->post('link_text',true));
        $data['link_type']   = trim($this->request->post('link_type',true));
        $data['link_url']    = trim($this->request->post('link_url',true));
        $data['link_status'] = intval($this->request->post('link_status'));
        $data['link_order']  = intval($this->request->post('link_order'));
        $data['link_href']   = trim($this->request->post('link_href',true));
        $data['link_target'] = trim($this->request->post('link_target',true));

        $message = "链接：{$data['link_text']} 已成功保存！";
        $return  = site_url($this->list_url);

        if ( ! empty($this->error) )
            $this->Message->failure( $this->error );

        if ( $id > 0 AND $this->MLink->getCounts(array('link_id='.$id)) > 0 ) {
            $this->MLink->save($data, 'UPDATE', $id);
            $buttons = array(
                '继续编辑' => site_url('admin/link-edit&id='.$id), 
                '再次添加' => site_url('admin/link-add'),
                '返回列表' => $return
            );
        } else {
            $this->MLink->save($data);
            $buttons = array(
                '继续添加' => site_url('admin/link-add'), 
                '返回列表' => $return
            );
        }
        $this->_setLoseData();
        $this->Message->success($message, $buttons, $return);
    }
}

?>