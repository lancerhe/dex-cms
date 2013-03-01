<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

class LandingController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        //$this->cache->run();
		$data = array();
		$this->load->model('MAd');
		$this->load->model('MArt');
		
		$data['ad']       = $this->MAd->getRows(array('ad_status=1', "ad_type='F'", "ad_apply='index'"), array(), 1 ,5)->rows;
        $data['case']     = $this->getList('case', 10);
		$data['material'] = $this->getList('material', 6);

        $this->load->display('index', $data);
    }
    
    private function getList($cate_abbr, $num) {
        $where = array('art_status = 1', "C.art_cate_abbr='{$cate_abbr}'");
        $order = array('art_top DESC, art_publishdate DESC');
        return $this->MArt->getRows($where, $order, 1, $num)->rows;
    }
}