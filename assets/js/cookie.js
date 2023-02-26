// COOKIE

// Funzione #1
function setCookie(cookieName, cookieValue, expDays) {
	let d = new Date();
	console.log(d);

	d.setTime(d.getTime() + expDays * 24 * 60 * 60 * 1000);

	let expires = "expires" + d.toUTCString();
	console.log(expires);

	document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";";
}

// Funzione #2
function getCookie(cookieName) {
	let nameEQ = cookieName + "=";
	let cookieArray = document.cookie.split(";");
	let result = null;
    
	for (let i = 0; i < cookieArray.length; i++) {
        let c = cookieArray[i];
        
		while (c.charAt(0) == " ") {
            c = c.substring(1, c.length);
		}
		if (c.indexOf(nameEQ) == 0) {
            result = c.substring(nameEQ.length, c.length);
		}
	}
	return result;
}
