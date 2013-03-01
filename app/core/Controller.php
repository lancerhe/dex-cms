<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2011
 */

!defined('DEX') && die('Access denied');

Class Controller extends Dex_Controller {
	function __construct() {
        parent::__construct();
        $site = $this->load->config('Site') ;

        if ( ! is_array($site) ) {
            $this->load->model('MSystem');
            $this->MSystem->create();
            $site = $this->load->config('site');
        }
        $this->load->addvar($site);
    }
}