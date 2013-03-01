<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class MLink extends Model {

    function __construct() {
        parent::__construct();
    }

    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT link_id, link_text, link_type, link_url, link_href, link_target, link_order, link_status FROM dex_link WHERE link_id>0";
        
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }

    public function getRowById($id) {
        if ( $id == 0 )
            return false;
        
        $sql = $this->_setBaseSql( array("link_id=" . $id) );
        return $this->db->query($sql)->one;
    }


    function save($data, $mode='INSERT', $id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_link', $data, "link_id={$id}");
        else {
            $query = $this->db->insert('dex_link', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }
    
    function update($options=array(), $id) {
        if ( empty($options) )
            return false;
        
        if ( is_array($id) ) $id = implode(',', $id);
        
        return $this->db->update('dex_link', $options, "link_id IN({$id})");
    }
    
    
    function del($id) {
        if ( is_array($id) ) $id = implode(',', $id);

        $sql = "DELETE FROM dex_link WHERE link_id IN({$id})";
        return $this->db->query($sql);
    }
    
}

?>