<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class MainController extends AdminController {

    function index() {
        $data['title']  = '后台管理系统 - 学生网';
        $this->load->view('admin/main_layout', $data);
    }

}
?>