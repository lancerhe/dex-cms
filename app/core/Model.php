<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2011
 */

!defined('DEX') && die('Access denied');

Class Model extends Dex_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    protected function _MsetBaseSql( $sql, $where=array(), $order=array() ) {
        if ( !empty($where) AND is_array($where) ) {
            foreach ($where AS $w)
                $sql .= " AND ".$w;
        }
        
        if ( !empty($order) AND is_array($order) ) {
            $sql .= " ORDER BY";
            foreach ($order AS $o)
                $sql .= " {$o},";
            
            $sql = rtrim($sql, ',');
        }

        return $sql;
    }

    protected function _setBaseSql( $where=array(), $order=array()) {

    }

    public function getCounts( $where=array() ) {
        $sql = $this->_setBaseSql( $where );
        return $this->db->query($sql)->num;
    }


    public function getRows( $where=NULL, $order=NULL, $page=false, $page_size=10) {
        $sql = $this->_setBaseSql( $where, $order );
        if ($page > 0)
            $sql.= " LIMIT " . ($page - 1) * $page_size . ", ". $page_size;
        return $this->db->query($sql);
    }
}