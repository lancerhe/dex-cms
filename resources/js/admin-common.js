function hasCheckOne() {
	var checked = "";
	var checks = document.getElementsByName("id[]");
    var length = document.getElementsByName("id[]").length
	for(i=0;i<length;i++) {
		if( checks[i].checked ) {
			checked += checks[i].value;
		}
	}
    
    if ( ! checked ) {
        art.dialog.alert('请至少勾选一项后进行操作');
        return false;
    }
	return true;
}

function checkAll() {
    var checks = document.getElementsByName("id[]");
    var length = document.getElementsByName("id[]").length
	for(i=0;i<length;i++) {
		if( ! checks[i].checked) checks[i].checked=true;
	}
}
function unCheckAll() {
	var checks = document.getElementsByName("id[]");
    var length = document.getElementsByName("id[]").length
	for(i=0;i<length;i++) {
		if( checks[i].checked) checks[i].checked=false;
	}
}