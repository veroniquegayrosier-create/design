// JavaScript Document

//ecran >900px

// JavaScript Document

$(document).ready(function(){
  
	



// toutes les div
var collection = document.querySelectorAll("#img-accueil> div");
// on boucle
for (var i = 0; i < collection.length; i++) {
  if (i > 1) {
    collection[i].style.opacity = 0;
  } else {
    collection[i].style.opacity = 1;
  }
}

setInterval(function() { 
    var collection = document.querySelectorAll("#img-accueil> div");
    collection[0].style.opacity = 0;
    collection[1].style.opacity = 1;
    collection[2].style.opacity = 1;
    collection[0].parentNode.removeChild(collection[0]);
    collection[1].parentNode.appendChild(collection[0]);
},  4000);

/**
$("#img-accueil > div:gt(0)").hide();

setInterval(function() { 
  $('#img-accueil > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
	.appendTo('#img-accueil');
},  3000);

**/
//ecran <900px
/**
$("#img-accueil-r > div:gt(0)").hide();

setInterval(function() { 
  $('#img-accueil-r > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#img-accueil-r');
},  3000);


*/
});
