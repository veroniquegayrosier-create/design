
// Affichage sous-menu
function affiche(obj){
	var id = obj.id;
	
	for(var i = 1; i <= 2; i++){
		document.getElementById('sousmenu'+i).style.display = "none";
	}
	
	if(document.getElementById('sous'+id)){
		document.getElementById('sous'+id).style.display = "block";
	}
}

function masque(obj){
	var id = obj.id;
	
	for(var i = 1; i <= 2; i++){
		document.getElementById('sousmenu'+i).style.display = "none";
	}
	
	if(document.getElementById('sous'+id)){
		document.getElementById('sous'+id).style.display = "none";
	}
}


function afficheIntro(obj){
	document.getElementById('intro-escamotable').style.visibility = 'visible';
	
}
function masqueIntro(obj){
	document.getElementById('intro-escamotable').style.visibility = 'hidden';
	
}