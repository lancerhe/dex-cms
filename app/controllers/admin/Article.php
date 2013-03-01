<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class ArticleController extends AdminController {

    protected $list_url = 'admin/article';
	
    private $page_size = 15;
    private $filter    = array(
        'art_title'  =>'文章标题'
    );
    private $order  = array(
        'art_publishdate-asc' => '发布时间升序',
        'art_publishdate-desc'=> '发布时间降序'
    );

    private $art_status_array = array(
        0 => '待审核', 
        1 => '已发布'
    );

    function __construct() {
        parent::__construct();
        $this->load->model('MArt');
        $this->base_folder = $this->config->get('article_html_path');
        $this->base_path   = BASE_PATH . $this->base_folder;
    }

    private function _setCateSelect($cate, $cate_selected='', $string='', $level=0) {
        
        foreach ($cate AS $row) {
            $selected    = ($row['cate_id'] == $cate_selected) ? ' selected' : NULL;
            $string .= "<option value=\"{$row['cate_id']}\"{$selected}>".str_repeat("&#160;&#160;", $level).'┕'.$row['cate_name']."</option>";
            if ( is_array($row['cate_sub']) AND !empty($row['cate_sub']) ) {
                $level++;
                $string = $this->_setCateSelect($row['cate_sub'], $cate_selected, $string, $level);
                $level--;
            }
        }
        return $string;
    }

    private function _setCateList($cate, $string='', $level=1) {
        foreach ($cate AS $row) {
            $counts = $this->MArt->getCountsByCateId($row['cate_id']);
            $string .= "<div id=\"cate-wrap-{$row['cate_id']}\" class=\"cate-wrap\">";
            $string .= "<div class=\"cate-prefix-wrap pull-left\" style=\"padding-left:". (30*$level)."px;padding-right:5px;\">└ </div>";
            $string .= "<div class=\"cate-name pull-left\">
                        {$row['cate_name']}
                        <span class=\"text-info\">[别名：{$row['cate_abbr']}]</span>
                        <span class=\"text-info\">[文章数：{$counts}]</span>
                        </div>";
            $string .= "<div class=\"cate-operate pull-right\">
                <a href=\"javascript:;\" class=\"btn btn-small btn-success\" onClick=\"previewCate('{$row['cate_abbr']}')\"><i class=\"icon-search icon-white\"></i> 预览</a> 
                <a href=\"javascript:;\" class=\"btn btn-small btn-primary\" onClick=\"addCate({$row['cate_id']})\"><i class=\"icon-plus icon-white\"></i> 添加</a> 
                <a href=\"javascript:;\" class=\"btn btn-small btn-primary\" onClick=\"editCate({$row['cate_id']})\"><i class=\"icon-edit icon-white\"></i> 编辑</a> 
                <a href=\"javascript:;\" class=\"btn btn-small btn-info\" onClick=\"moveCate({$row['cate_id']})\"><i class=\"icon-move icon-white\"></i> 移动</a> 
                <a href=\"javascript:;\" class=\"btn btn-small btn-danger\" onClick=\"delCate({$row['cate_id']})\"><i class=\"icon-remove icon-white\"></i> 删除</a></div>";
            $string .= "</div>";
            if ( is_array($row['cate_sub']) AND !empty($row['cate_sub']) ) {
                $level++;
                $string = $this->_setCateList($row['cate_sub'], $string, $level);
                $level--;
            }
        }
        return $string;
    }

    private function getPageName($i) {
        if ($i == 1)
            return 'index.html';
        else
            return "list-{$i}.html";
    }

    function index() {
        parent::index();

        $current_page = intval($this->request->get('page'));
        $current_page = $current_page > 1 ? $current_page : 1;
        
        $cate = intval($this->request->get('cate'));
        $cate = $cate > 0 ? $cate : 0;
        
        $filter = $this->request->get('filter');
        $keyword= $this->request->get('keyword');
        $order  = $this->request->get('order');
        $where  = $orderby = array();
        if ( array_key_exists($filter, $this->filter) ) {
            $where[] = "$filter LIKE '%{$keyword}%'";
        }
        if ( array_key_exists($order, $this->order)) {
            $temp = explode('-', $order);
            $orderby[] = "{$temp[0]} {$temp[1]}";
        }
        
        if ( $cate ) {
            $where[] = 'B.art_cate_id='.$cate;
        } else {
            //$current_url = site_url("admin/article&page={$current_page}");
        }
        $total = $this->MArt->getCounts($where);
        
        
        $this->load->library('AdminPage');
        $this->AdminPage->setCurrentPage($current_page);
        $this->AdminPage->setPageSize($this->page_size);
        $this->AdminPage->setTotalNum($total);
        $page = $this->AdminPage->output();
        $rows = $this->MArt->getRows($where, $orderby, $current_page, $this->page_size)->rows;
        $cate = $this->MArt->getCateSub();
        
        $data   = array();
        $data['page'] = $page;
        $data['rows'] = $rows;
        $data['cate'] = $this->_setCateSelect($cate);
        $data['keyword'] = $keyword;
        $data['filter']  = $this->Form->setOption($this->filter, $filter, TRUE, FALSE);
        $data['order']   = $this->Form->setOption($this->order, $order, TRUE, FALSE);
        $this->load->viewAdmin('article_list', $data);
    }

    

    function cate() {
        $cate = $this->MArt->getCateSub();
        
        $data = array();
        $data['cate'] = $this->_setCateSelect($cate);
        $data['list'] = $this->_setCateList($cate);
        $this->load->viewAdmin('article_cate', $data);
    }
    
    function catesave() {
        $action = $this->request->post('action');
        $data   = array();
        switch($action) {
            case 'edit':
                $cate_id = intval($this->request->post('cate_id'));
                $data['art_cate_name'] = $this->request->post('cate_name');
                $data['art_cate_abbr'] = $this->request->post('cate_abbr');
                if ( $this->MArt->saveCate($data, 'UPDATE', $cate_id) ) {
                    $this->_showSuccess("编辑分类成功！", site_url('admin/article-cate'));
                }
                break;
            case 'add':
                $data['art_cate_fid']  = intval($this->request->post('cate_fid'));
                $data['art_cate_name'] = $this->request->post('cate_name');
                $data['art_cate_abbr'] = $this->request->post('cate_abbr');
                if ( $this->MArt->saveCate($data) ) {
                    $this->_showSuccess("添加分类成功！", site_url('admin/article-cate'));
                }
                break;
            case 'del':
                $cate_id = intval($this->request->post('cate_id'));
                if ( $this->MArt->delCate($cate_id) ) {
                    $this->_showSuccess("删除分类成功！", site_url('admin/article-cate'));
                }
            case 'move':
                $cate_id = intval($this->request->post('cate_id'));
                $data['art_cate_fid'] = intval($this->request->post('cate_select'));
                if ($cate_id == $data['art_cate_fid']) {
                    $this->_showSuccess("移动分类成功！", site_url('admin/article-cate'));
                }
                if ( $this->MArt->saveCate($data, 'UPDATE', $cate_id) ) {
                    $this->_showSuccess("移动分类成功！", site_url('admin/article-cate'));
                }
            default:
                $this->response->redirect('admin/article-cate');
        }
    }
    
    
    function htmlcate() {
        $cate = $this->MArt->getCate();
        
        $message = '';

        foreach ($cate AS $row) {

            $path   = $this->base_path . '/' . $row['cate_abbr'];
            $folder = $this->base_folder . '/' . $row['cate_abbr'];
            if ( ! is_dir($path) ) 
                mkdir($path, 0775, TRUE);

            $i = 1;
            while ( $i > 0 ) {
                $content = file_get_contents( site_url("article-cate&action=html&abbr={$row['cate_abbr']}&page={$i}") );

                if ( empty ($content) )
                    break;

                $page = $this->getPageName($i);
                
                $file = $path . '/' . $page;
                if ( create_file($file, $content) ) {
                    $cate_url = '/' . ltrim($folder . '/' . $page, '/');
                    $message .= "已完成更新: {$cate_url}<br />";
                }
                
                $i++;
            
            }
        }
        
        $message .= "栏目更新成功";
        $this->_showSuccess($message, site_url($this->list_url));
    }
    
    
    function htmlpage() {
        $page  = $this->request->get('page');
        $page  = $page ? intval($page) : 1;
        $total = $this->MArt->getCounts();
        $pagesize = 10;
        $leave = $page * $pagesize;
        $leave > $total && $leave = $total;
		
        $rows = $this->MArt->getRows(array('art_status'=>1), array(), $page, $pagesize)->rows;

        if ( ! empty($rows) ) {
            $message = '<p style="padding:10px;">';
            foreach ($rows AS $row ) {
                $file = $this->_createHTML($row['art_id']);
                if ( $file ) {
                    $art_url = '/' . ltrim($file, '/');
                    $this->MArt->update(array('art_url'=> $art_url), $row['art_id']);
                    $message .= "已更新: {$art_url}<br />";
                }
            }
            $message .= "<font color=red>{$leave}</font> / <font color=red>{$total}</font>篇文章</p>";
            $page++;
			//echo $message; echo site_url('admin/article-htmlpage&page='.$page);exit();
            $this->Message->success($message, array(), site_url('admin/article-htmlpage&page='.$page), 2 );
        } else {
            $this->_showSuccess("更新成功！", site_url($this->list_url));
        }
        
        //echo $total;
    }
    
    function update() {
        $ids = $this->_getPostIds();
        foreach($ids AS $id) {
            $file = $this->_createHTML($id);
            if ( $file ) {
                $art_url = '/' . ltrim($file, '/');
                $this->MArt->update(array('art_url'=> $art_url), $id);
            }
        }
        $this->_showSuccess("更新成功！", $this->request->post('url'));
    }
    
    function audit() {
        $ids = $this->_getPostIds();
        if ( $this->MArt->update(array('art_status'=>1), $ids) ) {
            $this->_showSuccess("状态开放成功！", $this->request->post('url'));
        }
    }
    
    function top() {
        $ids = $this->_getPostIds();
        if ( $this->MArt->update(array('art_top'=>1), $ids) ) {
            $this->_showSuccess("置顶成功！", $this->request->post('url'));
        }
    }
    
    function move() {
        $ids = $this->_getPostIds();
        $cate_id = intval($this->request->post('cate_id'));
        if ($cate_id AND $this->MArt->update(array('art_cate_id' => $cate_id), $ids) ) {
            $this->_showSuccess("移动成功！", $this->request->post('url'));
        }
    }
    
    function del() {
        $ids = $this->_getPostIds();
        
        if ($this->MArt->del($ids)) {
            $this->_showSuccess("删除添加！", $this->request->post('url'));
        }
    }


    function doCate() {
        $art_cate_id   = intval($this->request->post['cate_id']) > 0 ? intval($this->request->post['cate_id']) : 0;
        $data = array();
        $data['art_cate_name'] = $this->request->post['cate_name'];
        $data['art_cate_abbr'] = $this->request->post['cate_abbr'];
        $data['art_module_id'] = $this->module_id;
        if ($art_cate_id > 0) {
            $this->MArt->saveCate($data, 'UPDATE', $art_cate_id);
            ob_clean();
            echo 'succeed';
            exit();
        } else {
            $cate_id = $this->MArt->saveCate($data);
            ob_clean();
            echo $cate_id;
            exit();
        }
    }

    function add() {
        $row  = $this->_getLoseData();
        $cate = $this->MArt->getCateSub();
        
        $data = array();
        $data['row']    = $row;
        $data['cate']   = $this->_setCateSelect($cate);
        $data['status'] = $this->Form->setOption($this->art_status_array, 0);
        $data['action'] = 'doAdd';
        $data['cancel'] = $this->back_url;
        $this->load->viewAdmin('article_edit', $data);
    }

    function edit() {
        $id = intval($this->request->get('id'));

        if ( ! $id )
            $this->_backtoList();

        $row = $this->_getLoseData();
        if ( is_null( $row ) ) 
            $row = $this->MArt->getArtDetail($id);

        if ( ! $row )
            $this->_showFailure();

        $cate = $this->MArt->getCateSub();
        
        $data = array();
        $row['art_publishdate'] = date('Y-m-d',$row['art_publishdate']);
        $row['art_content']     = stripslashes($row['art_content']);
        $data['row']    = $row;
        $data['cate']   = $this->_setCateSelect($cate, $row['art_cate_id']);
        $data['status'] = $this->Form->setOption($this->art_status_array, $row['art_status']);
        $data['action'] = 'doEdit';
        $data['cancel'] = $this->back_url;
        $this->load->viewAdmin('article_edit', $data);
    }

    function save() {
        $this->_setPostData();
        $art_id = $this->art_id;
        $return  = site_url($this->list_url);
        $message = "文章：{$this->base['art_title']} 已成功保存！";

        if ( ! $art_id ) {
            $art_id = $this->MArt->saveBase($this->base);
            $this->detail['art_id'] = $art_id;
            $this->MArt->saveDetail($this->detail);

            $buttons = array(
                '继续添加' => site_url('admin/article-add'), 
                '返回列表' => $return 
            );
        } else {
            $this->MArt->saveBase($this->base, 'UPDATE', $art_id);
            $this->MArt->saveDetail($this->detail, 'UPDATE', $art_id);

            $buttons = array(
                '继续编辑' => site_url('admin/article-edit&id=' . $art_id), 
                '返回列表' => $return 
            );
        }
        
        $art_url = $this->_createHTML($art_id);
        if ( $art_url ) {
            $art_url = '/' . ltrim($art_url, '/');
            $this->MArt->update(array('art_url'=> $art_url), $art_id);
        }
        $this->_setLoseData(NULL);
        $this->Message->success($message, $buttons, $return);
    }


    private function _createHTML($art_id) {
        $row = $this->MArt->getArtDetail($art_id);
        if ( ! $row )
            $this->_showFailure();

        $cate_id   = intval($row['art_cate_id']);
        $cate_abbr = $this->MArt->getCateAbbr($cate_id);
        $path      = $this->base_path . '/' . $cate_abbr;

        $content = file_get_contents( site_url("article-detail&id={$art_id}") );

        if ( ! is_dir($path) ) 
            mkdir($path, 0775, TRUE);
        
        $file = $path . '/' . $art_id . '.html';
        $url  = $this->base_folder . '/' . $cate_abbr . '/' . $art_id . '.html';
        if ( create_file($file, $content) )
            return $url;
        else
            return FALSE;
    }

    private function _setPostData() {
        $post = $this->request->post();
        $this->_setLoseData($post);
        $this->art_id = intval($this->request->post('art_id'));
        $this->base = $this->detail = array();
        $this->detail['art_keyword']   = trim($this->request->post('art_keyword', true));
        $this->detail['art_desc']      = trim($this->request->post('art_desc', true));
        $this->detail['art_content']   = $this->request->post('art_content');
        $this->base['art_title']       = trim($this->request->post('art_title', true));
        $this->base['art_intro']       = trim($this->request->post('art_intro', true));
        $this->base['art_cate_id']     = intval($this->request->post('art_cate_id'));
        $this->base['art_publishdate'] = strtotime($this->request->post('art_publishdate'));
        $this->base['art_views']       = intval($this->request->post('art_views'));
        $this->base['art_status']      = intval($this->request->post('art_status'));
        $this->base['art_top']         = intval($this->request->post('art_top'));
        if ( $this->base['art_publishdate'] <= 0)
            $this->base['art_publishdate'] = time();

        $content = stripslashes($this->detail['art_content']);
        
        /* set introduct */
        if ( empty($this->base['art_intro']) OR empty($this->detail['art_desc'])) {
            $nohtml_content = strip_tags($content);
            $nohtml_content = preg_replace("/\s/","", $nohtml_content);
            if ( empty($this->base['art_intro']) ) {
                $this->base['art_intro'] = strcut($nohtml_content, 200);
            }

            if ( empty($this->detail['art_desc']) ) {
                $this->detail['art_desc'] = strcut($nohtml_content, 100);
            }
        }

        $this->base['art_thumbnails'] = '';
        $this->base['art_hasattach']  = 0;
        /* set image */
        preg_match_all("/<img([^>]*)src=\"\/upload\/image\/([^\"]*)\"([^>]*)\/>/", $content, $matchs);
        if ( is_array($matchs[2]) AND count($matchs[2]) > 0) {
            $this->base['art_thumbnails'] = $matchs[2][0];
        }
        
        /* set has attachment */
        preg_match_all("/<a([^>]*)href=\"\/upload\/file\/([^\"]*)\"([^>]*)\>/", $content, $matchs);
        if ( is_array($matchs[2]) AND count($matchs[2]) > 0) {
            $this->base['art_hasattach'] = 1;
        }

        if ( $this->art_id == 0) {
            $this->base['art_createdate'] = time();
        }
    }

}