<?php
!defined('DEX') && die('Access denied');
/**
 * @author Lancer He <lancer.he@gmail.com>
 * @copyright 2012
 */

Class Message {

    private $body;

    public function success($message, $button=array(), $return='', $refresh=5) {
        $this->show('操作成功', $message, $button, $return, $refresh);
    }

    public function failure($message, $return='', $refresh=5) {
        $button = array('返回继续' => $return);
        $this->show('操作失败', $message, $button, $return, $refresh);
    }

    private function show($title, $message, $button=array(), $return='', $refresh=5) {

        $refreshStr = $refreshJs = $buttonStr = $messageStr = '';
        if ( $return ) {
            $refreshStr = "<p><strong><span id=\"refreshTime\">{$refresh}</span></strong> 秒后自动返回</p>";
            $refreshJs  = "
			<meta http-equiv=\"refresh\" content=\"{$refresh};url={$return}\" />
            <script type=\"text/javascript\">
			function countDown(){
 				var obj = document.getElementById(\"refreshTime\");
 				if(obj.innerHTML == 0){
      				//window.location.href='{$return}';
      				return false;
 				}
 			    obj.innerHTML = obj.innerHTML - 1;
			}
			window.setInterval(\"countDown()\", 1000);
			</script>";
        }

        if ( ! empty($button) ) {
            foreach( $button AS $text => $url) {
                $buttonStr .= "<a class=\"btn btn-small\" href=\"{$url}\">{$text}</a>";
            }
        }

        if ( is_array($message) ) {
            $messageStr .= '<ul>';
            foreach ($message AS $msg) {
                $messageStr .= "<li>{$msg}</li>";
            }
            $messageStr .= "</ul>";
        } else {
            $messageStr = "<p>{$message}</p>";
        }

        $html = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $html .="
        {$refreshJs}
        <link href=\"" . site_url() ."/resources/css/bootstrap.min.css\" rel=\"stylesheet\" />
        <link href=\"" . site_url() ."/resources/css/admin-common.css\" rel=\"stylesheet\" />
        </head>
        <body>
        <div class=\"modal\">
              <div class=\"modal-header\">
                <h4>".$title."</h4>
              </div>
              <div class=\"modal-body\">
                " . $messageStr . $refreshStr . "
              </div>";
        if ( $buttonStr )
            $html .= '<div class="modal-footer">'.$buttonStr.'</div>';
        $html .= "</div></body></html>";
        ob_clean();
        exit($html);
    }
}