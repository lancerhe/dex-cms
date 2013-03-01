<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class MAd extends Model {

    function __construct() {
        parent::__construct();
    }

    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT ad_id, ad_name, ad_apply, ad_type, ad_height, ad_width, ad_desc, ad_url, ad_href, ad_target, ad_status FROM dex_ad WHERE ad_id>0";
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }


    public function getRowById($id) {
        if ( $id == 0 )
            return false;
        
        $sql = $this->_setBaseSql( array("ad_id=" . $id) );
        return $this->db->query($sql)->one;
    }


    function save($data, $mode='INSERT', $id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_ad', $data, "ad_id={$id}");
        else {
            $query = $this->db->insert('dex_ad', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }
    
    function update($options=array(), $id) {
        if ( empty($options) )
            return false;
        
        if ( is_array($id) ) $id = implode(',', $id);
        
        return $this->db->update('dex_ad', $options, "ad_id IN({$id})");
    }
    
    
    function del($id) {
        if ( is_array($id) ) $id = implode(',', $id);

        $sql = "DELETE FROM dex_ad WHERE ad_id IN({$id})";
        return $this->db->query($sql);
    }
    
}

?>