window.onload = function () {
	const sld = new MicroSlider(".micro-slider", {});
	sld.toggleFullWidth(false, (window.innerWidth / 100) * 80, (window.innerHeight / 100) * 85);
	// const timer = 8000;
	// let autoPlay = setInterval(() => sld.next(), timer);
	addEventListener("resize", (event) => {
		sld.toggleFullWidth(false, (window.innerWidth / 100) * 80, (window.innerHeight / 100) * 85);
		sld.next();
	});
	// console.log(window.innerWidth);
};

// MEDIA QUERY FOR JS boh?
/* const mediaQuery = window.matchMedia("(min-width: 1000px)");
myFunction(mediaQuery); // Call listener function at run time
mediaQuery.addEventListener(myFunction); // Attach listener function on state changes */

// TOGGLE DARK-LIGHT MODE
const btn = document.querySelector("button");
btn.addEventListener("click", () => {
	document.body.classList.toggle("light");
	// Set Cookie
	if (getCookie("preference") == "light") {
		setCookie("preference", "dark", 365);
	} else {
		setCookie("preference", "light", 365);
	}

	document.body.classList.toggle("dark");
});

// TOGGLE SVG ON BLACK TO WHITE
/* const image = document.getElementById("myImage");
function changeImage() {
	if (image.getAttribute("src") === "/img/light_dark.svg") {
		image.setAttribute("src", "/img/dark_light.svg");
	} else {
		image.setAttribute("src", "/img/light_dark.svg");
	}
}
image.addEventListener("click", () => {
	changeImage();
}); */
