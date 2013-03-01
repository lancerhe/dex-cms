<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

require 'Admin.php';

Class SystemController extends AdminController {

	protected $list_url = 'admin/system';
	
    function __construct() {
        parent::__construct();

        $this->load->model('MSystem');
        $this->data = $this->MSystem->get();
    }
    
    function index() {
        parent::index();
        $this->load->viewAdmin('system_index', $this->data);
    }
    
    function core() {
        $this->load->viewAdmin('system_core', $this->data);
    }
    
    function attach() {
        $this->load->viewAdmin('system_attach', $this->data);
    }
    
    function article() {
        $this->load->viewAdmin('system_article', $this->data);
    }
    
    function save() {
        $post = $this->request->post(NULL, TRUE);
        $url  = $post['url'];
        unset($post['url']);

        $data = array();
        foreach ($post AS $op_name => $op_value) {
            switch ($op_name) {
                case 'article_html':
                case 'default_thumb_width':
                case 'default_thumb_height':
                    $op_value = intval($op_value);
                    break;
                case 'upload_image_type':
                case 'upload_file_type':
                case 'upload_media_type':
                    $op_value = trim($op_value, '|');
                
                default:
            }
            $data[$op_name] = $op_value;
        }
        $this->MSystem->save( $data );
        $this->MSystem->create();
        $this->_showSuccess("保存成功！", $url);
    }
}
?>