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
 *
 *
 */
class AdminPage{

    private $currennt_page; //当前页

    private $current_url; //当前URL

    private $total_num; //总记录数

    private $pagesize = 10; //每页显示数目

    private $pagelen = 5; //页面显示数目(长度)

    private $pageclass = 'pagination'; //所用分页样式类名

    private $pagestring; //分页HTML字符串

    private $total_pages; //总页数

    private $pageoffset = 3; //页数偏移量

    public $next_page  = '&gt;';

    public $last_page  = '&gt;&gt;';

    public $prev_page  = '&lt;';

    public $first_page = '&lt;&lt;';
    
    public function setCurrentPage($page) {
        $this->currennt_page = intval($page);
    }

    public function setTotalNum($num) {
        $this->total_num = intval($num);
    }

    public function setPageSize($pageSize) {
        $this->pagesize = intval($pageSize);
    }

    public function setCurrentUrl($current_url='') {
        if ( ! $current_url) {
            $Dex =& getInstance();
            $current_url = $Dex->request->server("REQUEST_URI");
    		$arrUrl     = parse_url($current_url);
    		$urlQuery   = $arrUrl["query"];
            
    		if($urlQuery){echo $this->current_url;
    			$urlQuery  = preg_replace("/(^|&)page={$this->currennt_page}/", "", $urlQuery);
                $urlQuery  = preg_replace("/(^|&)page=/", "", $urlQuery);
    			$current_url = str_replace($arrUrl["query"], $urlQuery, $current_url);   
    			 
    			if($urlQuery) $current_url.="&page=";
    			else $current_url.="page=";
    		} else {
    			$current_url.="?page=";
    		}
            $this->current_url = $current_url;

        } else {
            $this->current_url = rtrim($current_url, '/') . '/';
        }
    }

    public function output() {
        $this->setCurrentUrl();
        //init page param
        $this->setPageParam();
        //Create Pagecode Html
        $this->getPageString();
        return $this->pagestring;
    }


    private function setPageParam() {
        if (!$this->total_num) return array();

        $this->total_pages = ceil($this->total_num / $this->pagesize);

        $this->currennt_page < 1 && $this->currennt_page = 1;
        $this->currennt_page > $this->total_pages && $this->currennt_page = $this->total_pages;

        //Make sure pagelen is odd number.
        $this->pagelen = $this->pagelen % 2 ? $this->pagelen : $this->pagelen + 1;
        $this->pageoffset = ($this->pagelen - 1) / 2;
    }


    private function getPageString() {
        $this->pagestring = $this->pageclass ? '<div class="' . $this->pageclass . '">' : '<div>';
		$this->pagestring.= '<ul>';
        $this->setpagestring();
        $this->pagestring .= '</ul></div>';
    }

    private function setPageString() {

        $PageMin = 1;
        $PageMax = $this->total_pages;
        
        if( $this->currennt_page != 1 ) {
            $prev = $this->currennt_page-1 > 1 ? $this->currennt_page-1 : 1;
            $this->pagestring .= "<li><a href=\"{$this->current_url}1\">".$this->first_page."</a></li>
			<li><a href=\"{$this->current_url}".$prev."\">".$this->prev_page."</a></li>";
        } else {
			$this->pagestring .= "<li class=\"disabled\"><a href=\"javascript:;\">".$this->first_page."</a></li>
			<li class=\"disabled\"><a href=\"javascript:;\">".$this->prev_page."</a></li>";
		}
        
        //Ensure page offset number
        if($this->total_pages > $this->pagelen){
            if ($this->currennt_page <= $this->pageoffset) {
                $PageMin = 1;
                $PageMax = $this->pagelen;
            } else {
                if($this->currennt_page + $this->pageoffset >= $this->total_pages + 1){
                    $PageMin = $this->total_pages - $this->pagelen + 1;
                    $PageMax = $this->total_pages;
                } else {
                    $PageMin = $this->currennt_page - $this->pageoffset;
                    $PageMax = $this->currennt_page + $this->pageoffset;
                }
            }
        }

        for($i = $PageMin; $i <= $PageMax; $i++){
            if($i == $this->currennt_page){
                $this->pagestring .= '<li class="active"><a href="javascript:;">'.$i.'</a></li>';
            } else {
                $this->pagestring .= "<li><a href=\"{$this->current_url}{$i}\">$i</a></li>";
            }
        }

        if( $this->currennt_page != $this->total_pages){
            $next = $this->currennt_page+1 > $this->total_pages ? $this->total_pages : $this->currennt_page+1;
			$this->pagestring.="<li><a href=\"{$this->current_url}". $next ."\">".$this->next_page."</a></li>
							<li><a href=\"{$this->current_url}{$this->total_pages}\">".$this->last_page."</a></li>";
        } else {
			$this->pagestring.="<li class=\"disabled\"><a href=\"javascript:;\">".$this->next_page."</a></li>
							<li class=\"disabled\"><a href=\"javascript:;\">".$this->last_page."</a></li>";
		}
    }

}
?>
