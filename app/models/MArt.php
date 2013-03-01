<?php

/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

!defined('DEX') && die('Access denied');

class MArt extends Model{

    private $cateAbbrs = array();
    private $cateIds   = array();
    private $cateFids  = array();
    function __construct() {
        parent::__construct();
        $this->_init();
    }
    
    
    private function _init() {
        $data = $this->db->query("SELECT art_cate_abbr, art_cate_id, art_cate_name, art_cate_fid FROM dex_article_cate");
        if ($data->num == 0) 
            return array();
        
        foreach ($data->rows AS $row) {
            $this->cateAbbrs[$row['art_cate_abbr']] = array(
                'cate_id'   => $row['art_cate_id'],
                'cate_name' => $row['art_cate_name']
            );
            $this->cateIds[$row['art_cate_id']] = array(
                'cate_abbr' => $row['art_cate_abbr'],
                'cate_name' => $row['art_cate_name']
            );
            $this->cateFids[$row['art_cate_fid']][] = array(
                'cate_id'   => $row['art_cate_id'],
                'cate_abbr' => $row['art_cate_abbr'],
                'cate_name' => $row['art_cate_name']
            );
        }
        
        //$cate = $this->getSubCate($this->cateFids, 0);
        //print_r( $this->getCateSubIds(6) );
        //echo $this->getCateSubIds($this->getCateId('faq'));
        //$this->_setBaseSql(array('B.art_status=1', 'B.art_cate_id=3'), array('B.art_publishdate DESC', 'B.art_top DESC'));
        //echo $this->getArtCounts(array('B.art_status=1', 'B.art_cate_id=3'));
        //($this->getArtRows(array('B.art_status=1', 'B.art_cate_id=3'), '', 1, 2 ));
        //print_r($this->getArtDetail(5));
    }
    
    function getCate() {
        return $this->cateIds;
    }
    
    function getCateSub($cateFids=array(), $fid=0) {
        if ( empty($cateFids) )
            $cateFids = $this->cateFids;
        
        $cate = array();
        if ( ! is_array($cateFids[$fid]) )
            return false;
        
        foreach ($cateFids[$fid] AS $row) {
            $cate_id = $row['cate_id'];
            $cate[$cate_id] = $row;
            
            if ( isset( $cateFids[$cate_id] ) AND is_array( $cateFids[$cate_id] ) ) {
                $cate[$cate_id]['cate_sub'] = $this->getCateSub($cateFids, $cate_id);
                unset($cateFids[$cate_id]);
            }
        }
        return $cate;
    }
    
    
    public function getCateInfo($cate_flag) {
        if ( is_string($cate_flag) )
            return $this->cateAbbrs[$cate_flag];
        else
            return $this->cateIds[intval($cate_flag)];
    }
    
    
    public function getCateName($cate_flag) {
        $cate_info = $this->getCateInfo($cate_flag);
        return $cate_info['cate_name'];
    }
    
    
    public function getCateAbbr($cate_id) {
        $cate_info = $this->getCateInfo($cate_id);
        return $cate_info['cate_abbr'];
    }
    
    
    public function getCateId($cate_abbr) {
        $cate_info = $this->getCateInfo($cate_abbr);
        return $cate_info['cate_id'];
    }
    
    
    public function getCateSubIds($cate_id, $cate_ids=array()) {
        $cate_sub = $this->getCateSub($this->cateFids, $cate_id);
        if ( ! is_array($cate_sub) )
            return false;

        foreach ($cate_sub AS $cate_id => $cate_info) {
            $cate_ids[] = $cate_id;
            if ( isset($cate_info['cate_sub']) AND isset($cate_info['cate_sub']) ) {
                $cate_ids = $this->getCateSubIds($cate_id, $cate_ids);
            }
        }
        return $cate_ids;
    }
    
    
    protected function _setBaseSql( $where=array(), $order=array()) {
        $sql = "SELECT B.art_id, B.art_cate_id, B.art_title, B.art_intro, B.art_url, B.art_createdate, B.art_publishdate, B.art_thumbnails, B.art_hasattach, B.art_views, B.art_top, B.art_status, 
        U.user_id, U.user_name,
        C.art_cate_abbr, C.art_cate_name 
        FROM dex_article_cate C, dex_article_base B 
        LEFT JOIN dex_user U 
        ON U.user_id = B.art_user_id 
        WHERE C.art_cate_id = B.art_cate_id";
        
        $sql = $this->_MsetBaseSql( $sql, $where, $order );
        return $sql;
    }

    public function getCountsByCateId($cate_id, $cate_sub=False, $counts=0) {
        $counts += $this->getCounts(array('B.art_cate_id='. $cate_id));

        if ( ! $cate_sub ) {
            return $counts;
        }

        $cate_sub = $this->db->query("SELECT art_cate_id FROM dex_article_cate WHERE art_cate_fid=" . $cate_id);
        if ( $cate_sub->num == 0 ) 
            return $counts;

        foreach ($cate_sub->rows AS $row) {
            $counts = $this->getCountsByCateId($row['art_cate_id'], true, $counts);
        }
        return $counts;
    }

    public function getArtDetail($art_id) {
        if ( $art_id == 0 )
            return false;
        
        $sql = "SELECT B.art_id, B.art_cate_id, B.art_title, B.art_intro, B.art_url, B.art_createdate, B.art_publishdate, B.art_thumbnails, B.art_hasattach, B.art_views, B.art_top, B.art_status, D.art_keyword, D.art_desc, D.art_content, D.art_attach FROM dex_article_detail D, dex_article_base B LEFT JOIN dex_user ON B.art_user_id=user_id WHERE B.art_id=D.art_id AND B.art_id=".$art_id;
        
        return $this->db->query($sql)->one;
    }
    
    public function getArtComments($art_id) {
        if ( $art_id == 0 )
            return false;
        
        $sql = "SELECT art_comment_id, user_id, user_name, art_comment, art_commentdate FROM dex_article_comment LEFT JOIN dex_user ON user_id=art_user_id WHERE art_id=".$art_id;
        return $this->db->query($sql);
    }

    function saveCate($data, $mode='INSERT', $cate_id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_article_cate', $data, "art_cate_id={$cate_id}");
        else {
            $query = $this->db->insert('dex_article_cate', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }
    
    function delCate($cate_id) {
        return $this->db->query("DELETE FROM dex_article_cate WHERE art_cate_id=".$cate_id);
    }
        
    function saveBase($data, $mode='INSERT', $art_id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_article_base', $data, "art_id={$art_id}");
        else {
            $query = $this->db->insert('dex_article_base', $data);
            $query = $this->db->getLastId();
        }
        return $query;
    }
    
    function saveDetail($data, $mode='INSERT', $art_id='') {
        if ($mode == 'UPDATE')
            $query = $this->db->update('dex_article_detail', $data, "art_id={$art_id}");
        else
            $query = $this->db->insert('dex_article_detail', $data);
        return $query;
    }

    function update($options=array(), $id) {
        if ( empty($options) )
            return false;
        
        if ( is_array($id) ) $id = implode(',', $id);
        
        return $this->db->update('dex_article_base', $options, "art_id IN({$id})");
    }
    
    
    function del($id) {
        if ( is_array($id) ) $id = implode(',', $id);

        $sql = "DELETE B, D, C FROM dex_article_base B 
            INNER JOIN dex_article_detail D 
            ON B.art_id=D.art_id 
            LEFT JOIN dex_article_comment C 
            ON B.art_id=C.art_id WHERE B.art_id IN({$id})";

        return $this->db->query($sql);
    }
}
?>