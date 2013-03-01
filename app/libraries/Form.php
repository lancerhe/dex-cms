<?php
!defined('DEX') && die('Access denied');
Class Form {
    function setOption($data, $select, $key=TRUE, $default=TRUE) {
        $options = $default == TRUE ? '<option value="">SELECT</option>' : '';
        foreach ($data AS $k => $v) {
            $k =( $key == TRUE ? $k : $v);
            $selected = $k == $select ? ' selected' : NULL;
            $options .= "<option value=\"{$k}\"{$selected}>{$v}</option>";
        }
        return $options;
    }
    
    
    function setRadio($_array, $_checked, $_input_name, $_checked_key=TRUE) {
    	$string = '';
    	foreach ( $_array AS $k => $v ) {
    		$t       = $_checked_key ? $k : $v;
    		$checked = ($t == $_checked) ? 'checked' : NULL;
    		$_input_id = $_input_name . '_' . $t;
    		$string .= "<input class=\"label-widget\" id=\"$_input_id\" name=\"$_input_name\" type=\"radio\" value=\"$t\" $checked /><label for=\"$_input_id\" class=\"label\">$v</label>";
    	}
    	return $string;
    }
    
    function isEmail($C_mailaddr) {
		if (!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*$/", $C_mailaddr)){
			return false;
		}else{
			return true;
		}
	}
    
    function isWebAddr($C_weburl){
		if (!preg_match("/^http://[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*$/", $C_weburl)){
			return false;
		}
		return true;
	}
    
    function isLengthBetween($C_cahr, $I_len1, $I_len2=100) {
		$C_cahr = trim($C_cahr);
		if (strlen($C_cahr) < $I_len1) return false;
		if (strlen($C_cahr) > $I_len2) return false;
		return true;
	}
    
    function isUserName($C_user, $I_len1=4, $I_len2=20){
		if ( ! $this->isLengthBetween($C_user, $I_len1, $I_len2) ) return false; //¿í¶È¼ìÑé
		if ( ! preg_match("/^[\x80-\xff_a-zA-Z0-9]/",$C_user) ) return false;
		//if (!preg_match("/^[\x80-\xff_A-Za-z0-9]$+/",$C_user)) return false;   //ÌØÊâ×Ö·û¼ìÑé
		//if (!mb_ereg("^[_a-zA-Z0-9[Ò»-ý›]]+$", $C_user)) return false; //ÌØÊâ×Ö·û¼ìÑé
		return true;
	}
    
    function isPassword($C_passwd, $I_len1=6, $I_len2=16){
		if ( ! $this->isLengthBetween($C_passwd, $I_len1, $I_len2) ) return false; //¿í¶È¼ì²â
		//if ( ! preg_match("/^[_a-zA-Z0-9]*$/", $C_passwd) ) return false; //ÌØÊâ×Ö·û¼ì²â
		return true;
	}
    
    function isMd5($C_md5){
		$intLen = strlen($C_md5);
		if ($intLen != 16 && $intLen != 32) return false;
		if (!preg_match("/^[_a-f0-9]*$/", $C_md5)) return false; //ÌØÊâ×Ö·û¼ì²â
		return true;
	}
    
    function isTelephone($C_telephone){
		if (!preg_match("/^[+]?[0-9]+([xX-][0-9]+)*$/", $C_telephone)) return false;
		return true;
	}
    
    function isValueBetween($N_var, $N_var1, $N_var2) {
		if ($N_var < $N_var1 || $N_var > $N_var2){
			return false;
		}else{
			return true;
		}
	}
    
    function isPost($C_post) {
		$C_post=trim($C_post);
		if (strlen($C_post) == 6){
			if(!preg_match("/^[+]?[_0-9]*$/",$C_post)){
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}



}
?>