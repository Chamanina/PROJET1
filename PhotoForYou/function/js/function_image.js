function search_categ(chemin)
{
	let xhr;
	let l_categ = document.getElementById('l_categ').value;
	let params = '?l_categ=' + encodeURIComponent(l_categ);

	try { xhr = new ActiveXObject('Msxml2.XMLHTTP'); }
	catch (e)
	{ 
		try { xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
		catch (e2) 
		{
			try { xhr = new XMLHttpRequest(); }
			catch (e3) { xhr = false; } 
		} 
	}
	xhr.onreadystatechange = function()
	{
		if(xhr.readyState == 4) 
		{ 
			if(xhr.status == 200) { document.getElementById("form_doc").innerHTML = xhr.responseText; }
			else { document.getElementById("form_doc").innerHTML = xhr.status; }
		}
	}
	let envoi = chemin + params;
	xhr.open("GET", envoi, true);
	xhr.send(null);
}

