<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

class MSinglepage extends Model{

    function __construct() {
        parent::__construct();
    }


    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT page_id, page_title, page_name, page_keyword, page_desc, page_content FROM dex_singlepage WHERE page_id>0";
        
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }
    
    function getRowById($id) {
        if ( $id == 0 )
            return false;
        
        $sql  = $this->_setBaseSql( array("page_id={$id}") );
        $data = $this->db->query($sql);
        return ($data->num) ? $data->one : NULL;
    }

    function getRowsByPage($page, $page_size) {
        return $this->getRows(NULL, NULL, $page, $page_size)->rows;
    }

    function save($data, $mode='INSERT', $id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_singlepage', $data, "page_id={$id}");
        else {
            $query = $this->db->insert('dex_singlepage', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }

    function update($options=array(), $id) {
        if ( empty($options) )
            return false;
        
        if ( is_array($id) ) $id = implode(',', $id);
        
        return $this->db->update('dex_singlepage', $options, "page_id IN({$id})");
    }
    
    
    function del($id) {
        if ( is_array($id) ) $id = implode(',', $id);

        $sql = "DELETE FROM dex_singlepage WHERE page_id IN({$id})";

        return $this->db->query($sql);
    }
}
?>