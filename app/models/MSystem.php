<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

class MSystem extends Model{

    private $options = array();
    function __construct() {
        parent::__construct();
        $this->_init();
    }
    
    private function _init () {
        $data = $this->db->query("SELECT op_name, op_value FROM dex_options")->rows;
        foreach ($data AS $row)
            $this->options[$row['op_name']] = $row['op_value'];
    }

    function get($key='') {
        if ( $key )
            return $this->options[$key];
        
        return $this->options;
    }
    
    function save($data) {

        foreach ($data AS $op_name => $op_value) {
            if ( array_key_exists($op_name, $this->options) )
                $this->db->query("UPDATE dex_options SET op_value='{$op_value}' WHERE op_name='{$op_name}'");
        }
    }
    
    function create() {
        $this->_init ();
        $string = '<?php'.PHP_EOL;
        $string.= '!defined("DEX") && die("Access denied");'.PHP_EOL.PHP_EOL;
        foreach ( $this->options AS $op_name => $op_value ) {
            $string .= "\$CFG[\"$op_name\"] = \"$op_value\";".PHP_EOL;
        }
        $string .= '?>';
        $file   = APP_PATH . 'config/Site' . EXT;
        create_file($file, $string);
    }
}
?>