<?php
!defined('DEX') && die('Access denied');
/**
 * PHP分页类
 * @package Page
 * @author Lancer_He (lancer_he@hotmail.com)
 * @Created 2010-08-03
 * @Modify 2010-12-13
 * @link http://crackedzone.com/blog
 * Example:
 ==========================================================
		$page  = isset($_GET['page']) ? $_GET['page'] : 1;
		$sql   = 'select * from `project_list`';
		$num   = $db->num_rows($db->query($sql));

		$page = new page($page, $num, '', 3, 5);
		$GetPage = $page->Get_Page();

		$sql .= $GetPage['sqllimit'];

		$query = $db->query($sql);
		while ($rs = $db->fetch_array($query)) {
				echo $rs['id'].'<br />';
		}
		echo $GetPage['pagecode'];

		CSS Style
		<style type="text/css">
		<!--
		* {font-size:12px;padding:0;margin:0;}

		-->
		</style>
 ===========================================================
 *
 *
 */
class Page{

    private $CurrentPage; //当前页

    private $CurrentUrl; //当前URL

    private $TotalNum; //总记录数

    private $PageSize = 10; //每页显示数目

    private $PageLen = 5; //页面显示数目(长度)

    private $PageClass = 'pagination'; //所用分页样式类名

    private $PageCode; //分页HTML字符串

    private $TotalPages; //总页数

    private $PageOffset = 3; //页数偏移量

    public $IsAll    = TRUE; //是否显示当前页数 / 所有页数

    public $IsSelect = FALSE; //是否显示选择页面下拉框

    public $IsSearch = TRUE;  //是否显示搜索框
    
    public $IsShowPage = FALSE;

    public $nextPage  = '&gt;';

    public $lastPage  = '&gt;&gt;';

    public $prevPage  = '&lt;';

    public $firstPage = '&lt;&lt;';
    
    public $pageNumString = '';

    public $pageMode  = 1; //1 参数模式， 2 静态模式

    public function setCurrentPage($page) {
        $this->CurrentPage = intval($page);
    }

    public function setTotalNum($num) {
        $this->TotalNum = intval($num);
    }

    public function setPageSize($pageSize) {
        $this->PageSize = intval($pageSize);
    }

    public function setCurrentUrl($currentUrl='') {
        if ( ! $currentUrl) {
            $CurrentUrl = $_SERVER["REQUEST_URI"];
    		$arrUrl     = parse_url($CurrentUrl);
    		$urlQuery   = $arrUrl["query"];

    		if($urlQuery){
    			$urlQuery  = ereg_replace("(^|&)page={$this->CurrentPage}", "", $urlQuery);
                $urlQuery  = ereg_replace("(^|&)page=", "", $urlQuery);
    			$CurrentUrl = str_replace($arrUrl["query"], $urlQuery, $CurrentUrl);   
    			 
    			if($urlQuery) $CurrentUrl.="&page=";
    			else $CurrentUrl.="page=";
    		} else {
    			$CurrentUrl.="?page=";
    		}
            $this->CurrentUrl = $CurrentUrl;
        } else {
            $this->CurrentUrl = rtrim($currentUrl, '/') . '/';
        }
    }

    public function output() {
        $this->setCurrentUrl();
        //init page param
        $this->setPageParam();
        //Create Pagecode Html
        $this->getPageCode();
        return $this->PageCode;
    }


    private function setPageParam() {
        if (!$this->TotalNum) return array();

        $this->TotalPages = ceil($this->TotalNum / $this->PageSize);

        $this->CurrentPage < 1 && $this->CurrentPage = 1;
        $this->CurrentPage > $this->TotalPages && $this->CurrentPage = $this->TotalPages;

        //Make sure PageLen is odd number.
        $this->PageLen = $this->PageLen % 2 ? $this->PageLen : $this->PageLen + 1;
        $this->PageOffset = ($this->PageLen - 1) / 2;
    }


    private function getPageCode() {
        $this->PageCode = $this->PageClass ? '<div class="' . $this->PageClass . '">' : '<div>';

        $this->setPageCode();

        if ($this->IsAll) $this->setAllCode();

        if ($this->IsSelect) $this->setSelectCode();

        if ($this->IsSearch) $this->setSearchCode();

        $this->PageCode .= '</div>';
    }

    private function setPageCode() {

        $PageMin = 1;
        $PageMax = $this->TotalPages;
        
        if($this->IsShowPage OR $this->CurrentPage != 1) {
            $prev = $this->CurrentPage-1 > 1 ? $this->CurrentPage-1 : 1;
            if ($this->pageMode == 2) 
                $this->PageCode .= "<a href=\"list-1.html\">".$this->firstPage."</a><a href=\"list-{$prev}.html\">".$this->prevPage."</a>";
            else
                $this->PageCode .= "<a href=\"{$this->CurrentUrl}1\">".$this->firstPage."</a><a href=\"{$this->CurrentUrl}".$prev."\">".$this->prevPage."</a>";
        }
        
        //Ensure page offset number
        if($this->TotalPages > $this->PageLen){
            if ($this->CurrentPage <= $this->PageOffset) {
                $PageMin = 1;
                $PageMax = $this->PageLen;
            } else {
                if($this->CurrentPage + $this->PageOffset >= $this->TotalPages + 1){
                    $PageMin = $this->TotalPages - $this->PageLen + 1;
                    $PageMax = $this->TotalPages;
                } else {
                    $PageMin = $this->CurrentPage - $this->PageOffset;
                    $PageMax = $this->CurrentPage + $this->PageOffset;
                }
            }
        }

        for($i = $PageMin; $i <= $PageMax; $i++){
            if($i == $this->CurrentPage){
                $this->PageCode .= '<span class="current">'.$i.'</span>';
            } else {
                if ($this->pageMode == 2) 
                    $this->PageCode .= "<a href=\"list-{$i}.html\">$i</a>";
                else 
                    $this->PageCode .= "<a href=\"{$this->CurrentUrl}{$i}\">$i</a>";
            }
        }

        if($this->IsShowPage OR $this->CurrentPage != $this->TotalPages){
            $next = $this->CurrentPage+1 > $this->TotalPages ? $this->TotalPages : $this->CurrentPage+1;
            if ($this->pageMode == 2) 
                $this->PageCode.="<a href=\"list-{$next}.html\">".$this->nextPage."</a><a href=\"list-{$this->TotalPages}.html\">".$this->lastPage."</a>";
            else
                $this->PageCode.="<a href=\"{$this->CurrentUrl}". $next ."\">".$this->nextPage."</a><a href=\"{$this->CurrentUrl}{$this->TotalPages}\">".$this->lastPage."</a>";        //Last Page
        }
    }

    private function setAllCode() {
        $this->PageCode .= '<span class="all">' . $this->pageNumString . $this->CurrentPage . ' / ' . $this->TotalPages . '</span>';
    }


    private function setSelectCode() {
        $this->PageCode .= "<select name=\"Topage\" size=\"1\" onchange='window.location=\"$this->CurrentUrl=\"+this.value'>\n";
        for($i = 1; $i <= $this->TotalPages; $i++){
            if($i == $this->CurrentPage)
                $this->PageCode .= "<option value=\"$i\" selected>$i</option>\n";
            else
                $this->PageCode .= "<option value=\"$i\">$i</option>\n";
        }
        $this->PageCode .= "</select>";
    }


    private function setSearchCode() {
        $this->PageCode .= '<div class="page-searchwrap">';
        $this->PageCode .= '<input id="page-searchbox" onkeyup="if(/[^0-9]/g.test(this.value)){this.value=this.value.substr(0,this.value.length-1)}" type="text" size="3">';
        $this->PageCode .= '<input class="page-searchbtn" onclick="javascript:location=\'' . $this->CurrentUrl . '\'+document.getElementById(\'page-searchbox\').value+\'\'; return false;" value="Go" type="button" /></div>';
    }

}
?>
