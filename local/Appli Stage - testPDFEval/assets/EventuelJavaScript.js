/*login.php*/
function grossissement(x) {
	x.style.height = "70px";
  	x.style.width = "70px";
  	x.float = 'left';
}

function normalImg(x) {
  	x.style.height = "64px";
  	x.style.width = "64px";
}

/*evalSEP.php*/

/*login.php*/

function enable(elmt) {
	var email = elmt.value;
	var taille = email.length;

//pattern = input.validity

var list = elmt.closest('form').email.value;
var list2 = elmt.closest('form').passwd.value;
var pattern_valid = elmt.validity.valid;

	if (list.length > 0 && list2.length > 0) {
		document.getElementById('confirm').disabled = false;
	} else {
		document.getElementById('confirm').disabled = true;
	}

}