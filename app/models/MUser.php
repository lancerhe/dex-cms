<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class MUser extends Model {

    function __construct() {
        parent::__construct();
    }

    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT user_id, user_email, user_name, user_confirm, user_regdate FROM dex_user WHERE user_id>0";
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }


    public function getRow( $id ) {
        if ( $id == 0 )
            return false;
        
        $sql = $this->_setBaseSql( array("user_id=" . $id) );
        return $this->db->query($sql);
    }


    function save($data, $mode='INSERT', $id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_user', $data, "user_id={$id}");
        else {
            $query = $this->db->insert('dex_user', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }


    function update($options=array(), $id) {
        if ( empty($options) )
            return false;
        
        if ( is_array($id) ) $id = implode(',', $id);
        
        return $this->db->update('dex_user', $options, "user_id IN({$id})");
    }


    function del($id) {
        if ( is_array($id) ) $id = implode(',', $id);

        $sql = "DELETE FROM dex_user WHERE user_id IN({$id})";
        return $this->db->query($sql);
    }

    function isLogin() {
        if ( isset($_SESSION['SMC_UserLogin']) AND $_SESSION['SMC_UserLogin'] == 1 AND is_array($_SESSION['SMC_UserInfo']) ) {
            return TRUE ;
        } else {
            return FALSE ;
        }
    }
}

?>