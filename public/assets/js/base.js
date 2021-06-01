
window.onload = function () {
	let navbar = document.getElementById("navbar"),
	ch = new XMLHttpRequest;
	ch.onreadystatechange = function () {
		navbar.innerHTML = this.responseText;
	};
	ch.open("GET", "file:///home/ammarfaizi2/project/now/fp_web/navbar.txt");
	ch.send();
}
