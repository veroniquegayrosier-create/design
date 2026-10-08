// JavaScript Document

var myLinks = document.getElementsByID('menu-principal');
for(var i = 0; i < myLinks.length; i++){
   myLinks[i].addEventListener("touchstart", function(){this.className = "hover";}, false);
   myLinks[i].addEventListener("touchend", function(){this.className = "";}, false);
}