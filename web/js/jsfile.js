function afficheCache()
{
	if(document.getElementById('statut').value=="Payé")
		document.getElementById('payer').style.display="block";
	else document.getElementById('payer').style.display="none";
}
function cocherTout(etat)
{
   var cases = document.getElementsByTagName('input');   // on recupere tous les INPUT
   for(var i=0; i<cases.length; i++)     // on les parcourt
      if(cases[i].type == 'checkbox')     // si on a une checkbox...
         cases[i].checked = etat;     // ... on la coche
}
function mapopup(page,titre,hauteur,largeur,x,y)
{
window.open(page,titre,'height='+hauteur+',width='+largeur+',top='+x+',left='+y+',scrollbars=yes,resizable=no');
}
function submitenter(myfield,e)
{
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return true;

if (keycode == 13 && (document.formulaire.login.value != '') && (document.formulaire.pass.value != ''))
   {
	document.formulaire.submit();
	document.getElementById('connection').style.display = 'none';
	document.getElementById('imgload').style.display = 'inline';
   return false;
   }
else
   return true;
}

function marque()
{
	doc=document.location.href.split("?");
	if(doc.length==1)
		window.location.href = doc[0]+'?idCli='+document.getElementById('idClient').value;
	else if (doc.length==2)
		window.location.href = doc[0]+"?"+doc[1]+'&idCli='+document.getElementById('idClient').value;
	document.getElementById('idMarque').disabled=false;
}
function affichage(eltAafficher, eltAcacher1, eltAcacher2, eltAcacher3, eltAcacher4, eltAcacher5) 
{ 
	var eltAfficher = document.getElementById(eltAafficher);
	eltAfficher.style.display="block";
	var eltAcacher1 = document.getElementById(eltAcacher1); 
	eltAcacher1.style.display="none";
	var eltAcacher2 = document.getElementById(eltAcacher2); 
	eltAcacher2.style.display="none"; 
	var eltAcacher3 = document.getElementById(eltAcacher3); 
	eltAcacher3.style.display="none";
	var eltAcacher4 = document.getElementById(eltAcacher4); 
	eltAcacher4.style.display="none"; 
	var eltAcacher5 = document.getElementById(eltAcacher5); 
	eltAcacher5.style.display="none";
}
function ferme(eltAcacher1, eltAcacher2, eltAcacher3, eltAcacher4, eltAcacher5, eltAcacher6) 
{ 
	var eltAcacher1 = document.getElementById(eltAcacher1); 
	eltAcacher1.style.display="none";
	var eltAcacher2 = document.getElementById(eltAcacher2); 
	eltAcacher2.style.display="none"; 
	var eltAcacher3 = document.getElementById(eltAcacher3); 
	eltAcacher3.style.display="none";
	var eltAcacher4 = document.getElementById(eltAcacher4); 
	eltAcacher4.style.display="none"; 
	var eltAcacher5 = document.getElementById(eltAcacher5); 
	eltAcacher5.style.display="none";
	var eltAcacher6 = document.getElementById(eltAcacher6); 
	eltAcacher6.style.display="none";
}
function envoieRequete(url,id)
{
	var xhr_object = null;
	var position = id;
	   if(window.XMLHttpRequest)  xhr_object = new XMLHttpRequest();
	  else
	    if (window.ActiveXObject)  xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 

	// On ouvre la requete vers la page désirée
	xhr_object.open("GET", url, true);
	xhr_object.onreadystatechange = function(){
		if ( xhr_object.readyState == 4 )
		{
			// j'affiche dans la DIV spécifiées le contenu retourné par le fichier
			document.getElementById(position).innerHTML = xhr_object.responseText;
		}
	};
	// dans le cas du get
	xhr_object.send(null);

}