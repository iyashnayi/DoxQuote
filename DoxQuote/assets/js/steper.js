var currentTab = 0;
showTab(currentTab);

function showTab(n) {
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";

	if (n == 0) {
		document.getElementsById("goPrevGoBtn").style.display = "none";
	} else {
		document.getElementsById("goPrevGoBtn").style.display = "inline";
	}

	if (n == (x.length - 1)) {
		document.getElementsById("goNextBtn").innerHTML = "Register";
	} else {
		document.getElementsById("goNextBtn").innerHTML = "Next";
	}
	fixStepIndicator(n)
}
function nextPrev(n) {
	var x = document.getElementsByClassName("tab");
	if (n == 1 && !validate()) 
		return false;
	x[currentTab].style.display = "none";
	currentTab = currentTab + n;
	if (currentTab >= x.length) {
		document.getElementsById("regForm").submit();
		return false;
	}
	showTab(currentTab);
}

function validate() {
	var x, input, i, valid = true;
	x = document.getElementsByClassName("tab");
	input = x[currentTab].getElementsByClassName("form-control");
	for (i = 0; i < input.length; i++) {
		if (input[i].value == "") {
			input[i].className += "Invalid";
			valid = false;
		} 
	}
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += "afterDone";
	}
	return valid;
}
function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace("active", "");
	}
	x[n].className += "active";
}