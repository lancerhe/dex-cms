<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class SinglepageController extends AdminController {

    protected $list_url  = 'admin/singlepage';
    protected $page_size = 15;

    function __construct() {
        parent::__construct();
        $this->load->model('MSinglepage');
        $this->path   = $this->config->get('page_html_path');
        $this->folder = BASE_PATH . $this->path;
        if ( ! is_dir($this->folder) ) 
            mkdir($this->folder, 0775, TRUE);
    }
    
    function index() {
        parent::index();
        
        $current_page = intval($this->request->get('page'));
        $current_page = $current_page > 1 ? $current_page : 1;

        $total = $this->MSinglepage->getCounts($where);

        $this->load->library('AdminPage');
        $this->AdminPage->setCurrentPage($current_page);
        $this->AdminPage->setPageSize($this->page_size);
        $this->AdminPage->setTotalNum($total);
        $page = $this->AdminPage->output();
        $rows = $this->MSinglepage->getRowsByPage($current_page, $this->page_size);
        
        foreach ($rows AS $k => $row) {
            if ( file_exists( $this->folder . '/' . $row['page_name'] . '.html') ) {
                $rows[$k]['page_html'] = '<span class="label label-success"><i class="icon-ok icon-white"></i></span>';
                $rows[$k]['page_url']  = site_url() . '/' . $this->path . '/' . $row['page_name'] . '.html';
            } else {
                $rows[$k]['page_html'] = '<span class="label label-important"><i class="icon-remove icon-white"></i></span>';
                $rows[$k]['page_url']  = '';
            }
        }
        $data   = array();
        $data['page'] = $page;
        $data['rows'] = $rows;
        $data['path'] = $this->path;
        $this->load->viewAdmin('singlepage_list', $data);
    }

    function check() {
        if ( $this->request->get('name') ) {
            $name = trim($this->request->get('name', true));
            $data = $this->MSinglepage->getRows(array("page_name='$name'"));
            ob_clean();
            echo $data->num;
        }
    }

    function add() {
        $row = $this->_getLoseData();
        $data = array();
        $data['row']    = $row;
        $this->load->viewAdmin('singlepage_edit', $data);
    }

    function edit() {
        $id = intval($this->request->get('id'));

        if ( ! $id )
            $this->_backtoList();

        $row = $this->_getLoseData();

        if ( is_null($row) ) {
            $row = $this->MSinglepage->getRowById($id);
            if ( ! $row )
                $this->_showFailure();
        }

        $data = array();
        $row['page_content']     = stripslashes($row['page_content']);
        $data['row']    = $row;
        $this->load->viewAdmin('singlepage_edit', $data);
    }
    
  
    function htmlpage() {
        $page  = $this->request->get('page');
        $page  = $page ? intval($page) : 1;
        $total = $this->MSinglepage->getCounts();
        $pagesize = 10;
        $leave = $page * $pagesize;
        $leave > $total && $leave = $total;
        $rows = $this->MSinglepage->getRowsByPage($page, $pagesize);
        if ( ! empty($rows) ) {
            $message = '<p>';
            foreach ($rows AS $row ) {
                $file = $this->createHTML($row['page_id']);
                if ( $file ) 
                    $message .= "已更新: {$file}<br />";
            }
            $message .= "</p></p><span class=\"success\">{$leave}</font> / <span class=\"success\">{$total}</span>篇单页</p>";
            $page++;
            $this->Message->success($message, array(), site_url('admin/singlepage-htmlpage&page='.$page), 2 );
        } else {
            $this->_showSuccess("更新成功！", site_url('admin/singlepage'));
        }
    }
    
    function update() {
        $ids = $this->_getPostIds();
        foreach($ids AS $id) {
            $file = $this->createHTML($id);
        }
        $this->_showSuccess("更新成功！");
    }
    
    
    function del() {
        $ids = $this->_getPostIds();
        
        if ($this->MSinglepage->del($ids)) {
            $this->_showSuccess("删除添加！");
        }
    }


    function save() {
        $page_id = intval($this->request->post('page_id'));

        $this->_setLoseData($_POST);

        $data = array();
        $data['page_keyword'] = trim($this->request->post('page_keyword', true));
        $data['page_desc']    = trim($this->request->post('page_desc', true));
        $data['page_content'] = $this->request->post('page_content');
        $data['page_title']   = trim($this->request->post('page_title', true));
        $data['page_name']    = trim($this->request->post('page_name', true), '/');

        $return  = site_url($this->list_url);
        $message = "页面：{$data['page_title']} 已成功保存！";

        if ( ! $page_id )  {
            $page_id = $this->MSinglepage->save($data);

            $buttons = array(
                '继续添加' => site_url('admin/singlepage-add'), 
                '返回列表' => site_url($this->list_url) 
            );
        } else {
            //Delete old file.
            $old    = $this->MSinglepage->getRowById($page_id);
            $file   = $this->folder . '/' . $old['page_name'] . '.html';

            if ( file_exists($file) ) unlink($file);
            
            $this->MSinglepage->save($data, 'UPDATE', $page_id);
            
            $buttons = array(
                '继续编辑' => site_url('admin/singlepage-edit&id=' . $page_id), 
                '返回列表' => site_url($this->list_url)
            );
        }

        $this->createHTML($page_id);
        $this->_setLoseData();
        $this->Message->success($message, $buttons, $return);
    }

    private function createHTML($page_id) {
        $data    = $this->MSinglepage->getRowById($page_id);
        $file    = $this->folder . '/' . $data['page_name'] . '.html';
        $content = file_get_contents( site_url("single&id={$page_id}") );

        if ( create_file($file, $content) )
            return $file;
        else
            return FALSE;
    }
}