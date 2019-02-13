//CONSULTER / VOIR LES PHOTOS
	//Image MODAL (ZOOM)
	
function onClick(element, cpt) 
{
	document.getElementById("img"+cpt).src = element.src;
  	document.getElementById("modal"+cpt).style.display = "block";

   	// document.getElementById("image2").alt = element.alt;
}

