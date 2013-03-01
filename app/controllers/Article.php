<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class ArticleController extends Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MArt');
    }

    function cate() {
        $cate_abbr    = $this->request->get('abbr');
        $action       = $this->request->get('action');
        $current_page = intval($this->request->get('page'));
        $current_page = $current_page > 1 ? $current_page : 1;

        if ($cate_abbr == 'case') {
            $page_size = 9;
            $template  = 'list_case';
            $title     = "装修案例 第{$current_page}页 - " . $this->config->get('site_name');
        } elseif ($cate_abbr == 'material') {
            $page_size = 10;
            $template  = 'list_material';
            $title     = "装修材料 第{$current_page}页 - " . $this->config->get('site_name');
        } 

        $where = array('art_status = 1', "C.art_cate_abbr='{$cate_abbr}'");
        $order = array('art_top DESC, art_publishdate DESC');
        $total = $this->MArt->getCounts($where);

        if ( ! $template ) {
            if ($action == 'html') {
                ob_clean();exit();
            } else {
                $this->response->redirect();
            }
        }
        
        if ( $current_page > $total / $page_size + 1) {
            if ($action == 'html') {
                ob_clean();exit();
            } else {
                $this->response->redirect('article-cate&abbr=' . $cate_abbr);
            }
        }
        
        $this->load->library('Page');
        $this->Page->setCurrentPage($current_page);
        $this->Page->setPageSize($page_size);
        $this->Page->setTotalNum($total);
        $this->Page->IsSearch = FALSE;
        $this->Page->IsShowPage= TRUE;
        $this->Page->pageMode  = 2; //静态模式
        $this->Page->nextPage  = '下一页';
        $this->Page->lastPage  = '末页';
        $this->Page->prevPage  = '上一页';
        $this->Page->firstPage = '首页';
        $this->Page->pageNumString = '页次：';

        $page = $this->Page->output();
        $rows = $this->MArt->getRows($where, $order, $current_page, $page_size)->rows;
        
        $data   = array();
        $data['page'] = $page;
        $data['rows'] = $rows;
        $data['site_name'] = $title;
        $this->load->display($template, $data);
    }

    function detail() {
        $art_id = intval($this->request->get('id'));
        if ($art_id == 0)
            $this->response->redirect();

        $row = $this->MArt->getArtDetail($art_id);
        
        if ( ! $row )
            $this->response->redirect();

		$first = $this->MArt->getRows(array("art_id<".$art_id, 'B.art_cate_id='.$row['art_cate_id']), array('art_id DESC', 'art_publishdate DESC'), 1 ,1)->one;
		$next  = $this->MArt->getRows(array("art_id>".$art_id, 'B.art_cate_id='.$row['art_cate_id']), array('art_id ASC', 'art_publishdate ASC'), 1, 1)->one;

		
        //$this->cache->run();
        $data = array();
        $data['row'] = $row;
        $data['row']['art_content'] = stripcslashes($data['row']['art_content']);
        $data['site_name']    = $row['art_title'] . " - " . $this->config->get('site_name');
        $data['site_descrip'] = $row['art_desc'];
        $data['site_keyword'] = $row['art_keyword'];
		
		$data['art_first'] = ! empty($first) ? $first['art_url'] : 'javascript:void(0);';
		$data['art_last']  = ! empty($next) ? $next['art_url'] : 'javascript:void(0);';

        $this->load->display('detail', $data);
    }
}