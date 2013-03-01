<?php
!defined('DEX') && die('Access denied');
/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2011
 */

Class Database extends Dex_Database {

    public function __construct() {
        parent::__construct();
    }

    public function getAll($sql) {
        $query = $this->query($sql);
        return $query->rows;
    }

    public function getRow($sql) {
        $sql .= " LIMIT 1";
        $query = $this->query($sql);
        return $query->one;

    }
    public function insert($table, $data) {
        $sql = "INSERT INTO `{$table}`
                (`" . implode('`,`' , array_keys($data) ) . "`)
                VALUES
                ('" . implode("','" , $data ) . "')";
        return $this->query($sql);
    }

    public function update($table, $data, $where) {
        $sql = '';
        foreach ($data AS $field => $val) {
            $sql .= " `{$field}` = '".$val."' ,";
        }
        $sql = substr($sql, 0, -1);
        $sql = "UPDATE `{$table}` SET {$sql} WHERE {$where}";
        return $this->query($sql);
    }
}