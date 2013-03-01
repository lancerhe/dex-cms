<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class AdController extends AdminController {
	
	protected $list_url = 'admin/ad';
    
    private $ad_status_array = array(
        0 => '已关闭', 
        1 => '已投放'
    );
    
    private $ad_type_array = array(
        'I' => '图片',
        'F' => 'Flash'
    );
    
    private $ad_apply_array = array(
        'index'         => '首页',
        'global-header' => '全局头部区域',
        'global-footer' => '全局尾部区域',
        'article-main'  => '文章主要区域',
        'sidebar'       => '侧栏区域',
    );
    
    private $ad_target_array = array(
        '_blank'  => '新窗口打开',
        '_self'   => '自身打开'
    );
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('MAd');
    }
   
    
    function upload() {
        $upload = array($this->request->files('ad_file'));
        $this->load->library('Upload', $upload );
        $this->Upload->file_new_name_body = date('YmdHis', mktime());

        $this->Upload->process( UPFILE_PATH . 'ad/');
        $img_url = '/upload/ad/' . $this->Upload->file_dst_name;

	    ob_clean(); 
        echo json_encode(array(
            'url'    => $img_url,
            'width'  => $this->Upload->image_src_x,
            'height' => $this->Upload->image_src_y,
        ) );
        exit();
    }
    
    
    function index() {
        parent::index();

        $apply   = $this->request->get('apply');
        $keyword = $this->request->get('keyword');
        $where   = array("ad_apply = '$apply'");
        
        if ( ! array_key_exists($apply, $this->ad_apply_array) ) {
            $apply = '';
            $where = array();
        }
        if ( $keyword ) {
            array_push($where, "ad_name LIKE '%{$keyword}%'");
        }

        $rows = $this->MAd->getRows($where)->rows;
        foreach($rows AS $k => $row) {
            $rows[$k]['ad_apply_string'] = $this->ad_apply_array[$row['ad_apply']];
        }
        
        $data   = array();
        $data['rows']    = $rows;
        $data['keyword'] = $keyword;
        $data['filter']  = $this->Form->setOption($this->ad_apply_array, $apply, TRUE, FALSE);
        $this->load->viewAdmin('ad_list', $data);
    }


    function audit() {
        $ids = $this->setPostIds();
        if ( $this->MAd->update(array('ad_status'=>1), $ids) ) {
            $this->showSuccess("广告投放成功！", $this->request->post['url']);
        }
    }
    
    
    function unaudit() {
        $ids = $this->setPostIds();
        if ( $this->MAd->update(array('ad_status'=>0), $ids) ) {
            $this->showSuccess("广告关闭成功！", $this->request->post['url']);
        }
    }
    
    
    function del() {
        $ids = $this->setPostIds();
        
        if ($this->MAd->del($ids)) {
            $this->showSuccess("广告删除添加！", $this->request->post['url']);
        }
    }
    
    
    function add() {
        $row  = $this->_getLoseData();

        if ( is_null($row) ) {
            $row = array();
        }
        
        $data = array();
        $data['action']    = 'doAdd';
        $data['row']       = $row;
        $data['ad_apply']  = $this->Form->setOption($this->ad_apply_array, $row['ad_apply']);
        $data['ad_type']   = $this->Form->setOption($this->ad_type_array, $row['ad_type']);
        $data['ad_status'] = $this->Form->setOption($this->ad_status_array, $row['ad_status']);
        $data['ad_target'] = $this->Form->setOption($this->ad_target_array, $row['ad_target']);
        $this->load->viewAdmin('ad_edit', $data);
    }
    
    
    function edit() {
        $id = intval($this->request->get('id'));

        if ( ! $id )
            $this->_backtoList();

        $row = $this->_getLoseData();

        if ( is_null($row) ) {
            $row = $this->MAd->getRowById($id);
            if ( ! $row )
                $this->showFailure('不存在信息');
        }
        
        $data = array();
        $data['action']    = 'doEdit';
        $data['row']       = $row;
        $data['ad_apply']  = $this->Form->setOption($this->ad_apply_array,  $row['ad_apply']);
        $data['ad_type']   = $this->Form->setOption($this->ad_type_array,   $row['ad_type']);
        $data['ad_status'] = $this->Form->setOption($this->ad_status_array, $row['ad_status']);
        $data['ad_target'] = $this->Form->setOption($this->ad_target_array, $row['ad_target']);
        $this->load->viewAdmin('ad_edit', $data);
    }

    function save() {
        $data = $this->_setPostData();
        $id   = $this->ad_id;

        if ( ! empty($this->error) )
            $this->Message->failure( $this->error );

        $return  = site_url($this->list_url);
        $message = "广告：{$data['ad_name']}<br />保存成功！";
        if ( $id > 0 AND $this->MAd->getCounts(array('ad_id='.$id)) > 0 ) {
            $this->MAd->save($data, 'UPDATE', $id);
            $buttons = array(
                '继续编辑' => site_url('admin/ad-edit&id='.$id),
                '再次添加' => site_url('admin/ad-add'),
                '返回列表' => $return
            );
        } else {
            $this->MAd->save($data);
            $buttons = array(
                '继续添加' => site_url('admin/ad-add'), 
                '返回列表' => $return
            );
        }

        $this->_setLoseData();
        $this->Message->success($message, $buttons, $return);
    }


    private function _setPostData() {
        $this->ad_id = intval($this->request->post('ad_id'));

        $this->_setLoseData($_POST);
        $this->error = array();
        
        if ( ! $this->request->post('ad_name') )
            $this->error[] = '请输入广告名称';
            
        if ( ! $this->request->post('ad_url') )
            $this->error[] = "请上传广告图片";
        
        if ( ! $this->request->post('ad_apply') )
            $this->error[] = '请选择广告应用区域';
        
        $data = array();
        $data['ad_name']   = trim($this->request->post('ad_name',true));
        $data['ad_apply']  = trim($this->request->post('ad_apply',true));
        $data['ad_desc']   = trim($this->request->post('ad_desc',true));
        $data['ad_type']   = trim($this->request->post('ad_type',true));
        $data['ad_width']  = intval($this->request->post('ad_width'));
        $data['ad_height'] = intval($this->request->post('ad_height'));
        $data['ad_url']    = trim($this->request->post('ad_url',true));
        $data['ad_status'] = intval($this->request->post('ad_status'));
        $data['ad_href']   = trim($this->request->post('ad_href',true));
        $data['ad_target'] = trim($this->request->post('ad_target',true));
        return $data;
    }
}

?>