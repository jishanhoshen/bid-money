function menuslideon(){
	var menuon = document.getElementById('menubar-id');
	menuon.style.left='0';
	menuon.style.opacity='1';
	var menuon = document.getElementById('menubar-back-id');
	menuon.style.left='730px';
	menuon.style.opacity='1';
}
function menuslideoff(){
	var menuoff = document.getElementById('menubar-id');
	menuoff.style.left='-740px';
	menuoff.style.opacity='0';
	var menuoff = document.getElementById('menubar-back-id');
	menuoff.style.left='1000px';
	menuoff.style.opacity='0';
}