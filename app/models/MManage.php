<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

Class MManage extends Model {

    private $id   = 0;
    private $user = '';
    private $session_key = 'Manage_SMC';

    function __construct() {
        parent::__construct();
    }
    
    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT manage_id, manage_user, manage_pass FROM dex_manage WHERE manage_id>0";
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }


    public function getRow( $id ) {
        if ( $id == 0 )
            return false;
        
        $sql = $this->_setBaseSql( array("manage_id=" . $id) );
        return $this->db->query($sql);
    }


    function save($data, $mode='INSERT', $id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_manage', $data, "manage_id={$id}");
        else {
            $query = $this->db->insert('dex_manage', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }
    
    
    function isAccount( $username, $password ) {
        $row = $this->db->getRow("SELECT manage_id, manage_user FROM dex_manage WHERE manage_user='{$username}' AND manage_pass='{$password}'");
        if ($row['manage_id'] > 0) {
            $this->id   = $row['manage_id'];
            $this->user = $row['manage_user'];
            return TRUE ;
        }
        return FALSE ;
    }

    function isLogin() {
        if ( isset( $_SESSION[$this->session_key]['id' ] ) AND
            isset( $_SESSION[$this->session_key]['user'] ) AND
            $_SESSION[$this->session_key]['id'] > 0 ) {
            return TRUE ;
        }
        return FALSE ;
    }
    
    
    function getUser() {
        return $_SESSION[$this->session_key]['user'];
    }
    
    
    function getId() {
        return $_SESSION[$this->session_key]['id'];
    }
    
    
    function login() {
        $_SESSION[$this->session_key]['id']   = $this->id;
        $_SESSION[$this->session_key]['user'] = $this->user;
    }

    function logout() {
        unset($_SESSION[$this->session_key]);
    }
}

?>