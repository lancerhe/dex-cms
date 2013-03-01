<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class SingleController extends Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MSinglepage');
    }

    function index() {
        $id = intval($this->request->get('id'));
        if ($id == 0)
            $this->response->redirect();

        $row = $this->MSinglepage->getRowById($id);
        
        if ( ! $row)
            $this->response->redirect();
        
        //$this->cache->run();
        $data = array();
        $data['row'] = $row;
        $data['row']['page_content'] = stripcslashes($data['row']['page_content']);
        $data['site_name']    = $row['page_title'] . " - " . $this->config->get('site_name');
        $data['site_descrip'] = $row['page_desc'];
        $data['site_keyword'] = $row['page_keyword'];
        $this->load->display('singlepage', $data);
    }
}