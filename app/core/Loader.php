<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class Loader extends Dex_Loader {

    function __construct() {
        parent::__construct();
    }

    function viewAdmin($view, $var=array()) {
        $Dex =& getInstance();
        $data = array();
        $data['url']        = $Dex->request->server('REQUEST_URI');
        $data['action']     = $Dex->router->getAction();
        $data['controller'] = $Dex->router->getController();
        $var = array_merge($var, $data);
        $this->view('admin/main_header', $var);
        $this->view('admin/' . $view);
        $this->view('admin/main_footer');
    }

    function display($view, $var=array()) {
        $this->view('header', $var);
        $this->view($view);
        $this->view('footer');
    }
 }