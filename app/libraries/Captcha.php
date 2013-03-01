<?php
!defined('DEX') && die('Access denied');
class Captcha {

    private $im;          //image object
    private $im_width;    //image width
    private $im_height;   //image height
    private $len;         //font length

    private $randnum;     // rand string number
    private $y;           // y轴坐标值
    private $randcolor;   // rand color

    private $sessionKey = 'Code';
    //background color
    public $red   = 238;
    public $green = 238;
    public $blue  = 238;
    /**
    * 可选设置：验证码类型、干扰点、干扰线、Y轴随机
    * 设为 false 表示不启用
    **/

    public $ext_type   = array('U', 'L', 'N');  //Random string types  U: Uppercase, L:Lowercase, N:Number;
    public $ext_pixel    = true; //干扰点
    public $ext_line     = true; //干扰线
    public $ext_rand_y   = true; //Y轴随机


    function setSessionKey ($key) {
        $this->sessionKey = $key;
    }

    function __construct ($len=4,$im_height=25) {
        // 验证码长度、图片宽度、高度是实例化类时必需的数据
        $this->len  = $len;
        $this->im_width = $this->len * 15;
        $this->im_height= $im_height;
    }


    function setBgColor () {
        imagecolorallocate($this->im,$this->red,$this->green,$this->blue);
    }

    // 获得任意位数的随机码
    function getRandnum () {
        $Lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $Uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $Number    = '0123456789';

        $string = '';
        if ( in_array('L', $this->ext_type) )
            $string .= $Lowercase;
        if ( in_array('U', $this->ext_type) )
            $string .= $Uppercase;
        if ( in_array('N', $this->ext_type) )
            $string .= $Number;

        $randnum = '';
        for ($i = 0; $i < $this->len; $i++) {
            $start    = rand(1, strlen($string) - 1);
            $randnum .= substr($string, $start, 1);
        }
        $this->randnum = $randnum;
        $_SESSION['Captcha'][$this->sessionKey] = strtolower($this->randnum);
    }

    // 获得验证码图片Y轴
    function get_y () {
        if ($this->ext_rand_y)
            $this->y = rand(5, $this->im_height/5);
        else
            $this->y = $this->im_height / 4 ;
    }

    // 获得随机色
    function getRandcolor () {
        $this->randcolor = imagecolorallocate($this->im,rand(0,100),rand(0,150),rand(0,200));
    }

    // 添加干扰点
    function set_ext_pixel () {
        if ($this->ext_pixel) {
            for($i = 0; $i < 100; $i++){
                $this->getRandcolor();
                imagesetpixel($this->im, rand()%100, rand()%100, $this->randcolor);
            }
        }
    }

    // 添加干扰线
    function set_ext_line () {
        if ($this->ext_line) {
            for($j = 0; $j < 2; $j++){
                $rand_x  = rand(2, $this->im_width);
                $rand_y  = rand(2, $this->im_height);
                $rand_x2 = rand(2, $this->im_width);
                $rand_y2 = rand(2, $this->im_height);
                $this->getRandcolor();
                imageline($this->im, $rand_x, $rand_y, $rand_x2, $rand_y2, $this->randcolor);
            }
        }
    }


    function create () {
        $this->im = imagecreate($this->im_width,$this->im_height);
        $this->setBgColor ();
        $this->getRandnum ();
        for($i = 0; $i < $this->len; $i++){
            $font = rand(4,6);
            $x = $i/$this->len * $this->im_width + rand(1, $this->len);
            $this->get_y();
            $this->getRandcolor();
            imagestring($this->im, $font, $x, $this->y, substr($this->randnum, $i ,1), $this->randcolor);
        }
        $this->set_ext_line();
        $this->set_ext_pixel();
        header("content-type:image/png");
        imagepng($this->im);
        imagedestroy($this->im);
    }
}
?>