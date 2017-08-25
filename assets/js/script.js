function complete(str) {
    if (str == "") {
        document.getElementById("textHint").style.display="none";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("textHint").style.display="block";
                document.getElementById("textHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","http://localhost/edoc/index.php/emprunt/complete?user="+str,true);
        xmlhttp.send();
    }
}

function complete1(str) {
    if (str == "") {
        document.getElementById("completeTitre").style.display="none";
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
		else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("completeTitre").style.display="block";
                document.getElementById("completeTitre").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","http://localhost/edoc/index.php/emprunt/complete1?livre="+str,true);
        xmlhttp.send();
    }
}

function changeValue(c){
	c = c.replace('<td>','');
	c = c.replace('</td>','');
	document.getElementById("user").value=c;
	document.getElementById("textHint").style.display="none";
}

function changeValue1(c){
	c = c.replace('<td>','');
	c = c.replace('</td>','');
	document.getElementById("livre2").value=c;
	document.getElementById("completeTitre").style.display="none";
}

var idcat = 0;
var idlivre = 0;
var idrapport = 0;
var idreservation = 0;
var idemprunt = 0;
var iduser = 0;

function back(){
	history.back();
	window.location.reload();
}

function changePlaceholder(){
	if(document.getElementById("0").selected==true){
		document.getElementById('val').placeholder='';
	}
	
	if(document.getElementById("1").selected==true){
		document.getElementById('val').placeholder='Titre du rapport';
	}
	
	if(document.getElementById("2").selected==true){
		document.getElementById('val').placeholder='Type de rapport (pfe ou stage)';
	}
	
	if(document.getElementById("3").selected==true){
		document.getElementById('val').placeholder='Année (ex: 2014)';
	}
	
	if(document.getElementById("4").selected==true){
		document.getElementById('val').placeholder='Filière (ex: asr)';
	}
}

function supprimerCat(id){
	document.getElementById('id01').style.display='block';
	idcat = id;
}

function supprimerLivre(id){
	document.getElementById('id01').style.display='block';
	idlivre = id;
}

function supprimerRapport(id){
	document.getElementById('id02').style.display='block';
	idrapport = id;
}

function supprimerReservation(id){
	document.getElementById('id03').style.display='block';
	idreservation = id;
}

function supprimerEmprunt(id){
	document.getElementById('id04').style.display='block';
	idemprunt = id;
}

function supprimerUser(id){
	document.getElementById('id').style.display='block';
	iduser = id;
}

function confirm1(){
	window.location.replace("http://localhost/edoc/index.php/livre/supprimerCat/"+idcat);
}

function confirm2(){
	window.location.replace("http://localhost/edoc/index.php/livre/supprimer2/"+idlivre);
}

function confirm3(){
	window.location.replace("http://localhost/edoc/index.php/rapport/supprimer2/"+idrapport);
}

function confirm4(){
	window.location.replace("http://localhost/edoc/index.php/reservation/supprimer/"+idreservation);
}

function confirm5(){
	window.location.replace("http://localhost/edoc/index.php/emprunt/supprimer/"+idemprunt);
}

function confirmSup(){
	window.location.replace("http://localhost/edoc/index.php/user/supprimer/"+iduser);
}

function telecharger(fichier){
	var a = new String(fichier);
	window.location.replace(a);
}

