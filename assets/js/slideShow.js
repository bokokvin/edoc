function rand(min, max) {
	return Math.floor(Math.random() * (max - min + 1) + min);
}

function choose() {
	var img = ['url("assets/images/books1.jpg")', 'url("assets/images/books2.jpg")', 'url("assets/images/books3.jpg")', 'url("assets/images/books4.jpg")'];
	var i = rand(0,3);
	return img[i];
}

function slideshow(){
	var img = 'url("assets/images/books1.jpg")';
	img = choose();
	var b = document.getElementById("body");
	b.style.backgroundImage = img;
	setTimeout(slideshow, 7000);
}

function hideCne(){
	document.getElementById("cne").style.visibility = "hidden";
	document.getElementById("cne").style.display = "none";
}

function showCne(){
	document.getElementById("cne").style.display = "block";
	document.getElementById("cne").style.visibility = "visible";
}

function vnom(){
	var nom = document.getElementById("nom");
	if(nom.value.length<2){
		nom.style.borderColor="red";
	}
	else
	{
		nom.style.borderColor="#7BC74D";
	}
}

function vprenom(){
	var prenom = document.getElementById("prenom");
	if(prenom.value.length<2){
		prenom.style.borderColor="red";
	}
	else
	{
		prenom.style.borderColor="#7BC74D";
	}
}

function vemail(){
	var email = document.getElementById("email");
	if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)){
		email.style.borderColor="#7BC74D";
	}
	else
	{
		email.style.borderColor="red";
	}
}

function vtel(){
	var tel = document.getElementById("tel");
	if(isNaN(tel.value)){
		tel.style.borderColor="red";
	}
	else
	{
		tel.style.borderColor="#7BC74D";
	}
	
	if(tel.value.length<10 || tel.value.length>10){
		tel.style.borderColor="red";
	}
	else
	{
		tel.style.borderColor="#7BC74D";
	}
}

function vpass(){
	var m2p = document.getElementById("m2p");
	if(m2p.value.length<4){
		m2p.style.borderColor="red";
	}
	else
	{
		m2p.style.borderColor="#7BC74D";
	}
}

function vpassc(){
	var m2p = document.getElementById("m2p");
	var m2pConfirm = document.getElementById("m2pConfirm");
	
	if(m2p.value != m2pConfirm.value){
		m2pConfirm.style.borderColor="red";
	}
	else
	{
		m2pConfirm.style.borderColor="#7BC74D";
	}
}

function verification(){
var i=1;
var comp = 7;
	while(i<6){
		var a = $('#formContainer').find('.form_erreur').detach();
		i++;
	}
	var nom = document.getElementById("nom");
	var prenom = document.getElementById("prenom");
	var email = document.getElementById("email");
	var tel = document.getElementById("tel");
	var ch1 = document.getElementById("ch1");
	var ch2 = document.getElementById("ch2");
	var cne = document.getElementById("cne");
	var m2p = document.getElementById("m2p");
	var m2pConfirm = document.getElementById("m2pConfirm");
	
	if(nom.value.length<2 || prenom.value.length<2){
		$('#formContainer').append('<div class="form_erreur">Votre nom et votre prénom doivent contenir au moins deux caractères chacun</div>');
	}
	else
	{
		comp--;
	}
	
	if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)){
		comp--;
	}
	else
	{
		$('#formContainer').append('<div class="form_erreur">Email invalide</div>');
	}
	
	if(isNaN(tel.value)){
		$('#formContainer').append('<div class="form_erreur">Le champ téléphone ne doit contenir que des chiffres</div>');
	}
	else
	{
		comp--;
	}
	
	if(tel.value.length<10 || tel.value.length>10){
		$('#formContainer').append('<div class="form_erreur">Le téléphone doit etre composer de 10 chiffres</div>');
	}
	else
	{
		comp--;
	}
	
	if(ch1.checked && cne.value==''){
		$('#formContainer').append('<div class="form_erreur">Vous etes un étudiant, vous devez indiqué votre CNE</div>');
	}
	else
	{
		comp--;
	}
	
	if(m2p.value.length<4){
		$('#formContainer').append('<div class="form_erreur">Votre mot de passe doit contenir au moins 4 caractères</div>');
	}
	else
	{
		comp--;
	}
	
	if(m2p.value != m2pConfirm.value){
		$('#formContainer').append('<div class="form_erreur">Vous n\'avez pas entrer le meme mot de passe pour la confirmation</div>');
	}
	else
	{
		comp--;
	}
	
	if(comp==0){
		document.inscription.submit();
		document.inscription.reset();
	}
}

function verification2(){
var i=1;
var comp = 6;
	while(i<6){
		var a = $('#formContainer').find('.form_erreur').detach();
		i++;
	}
	var nom = document.getElementById("nom");
	var prenom = document.getElementById("prenom");
	var email = document.getElementById("email");
	var tel = document.getElementById("tel");
	var m2p = document.getElementById("m2p");
	var m2pConfirm = document.getElementById("m2pConfirm");
	
	if(nom.value.length<2 || prenom.value.length<2){
		$('#formContainer').append('<div class="form_erreur">Votre nom et votre prénom doivent contenir au moins deux caractères chacun</div>');
	}
	else
	{
		comp--;
	}
	
	if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email.value)){
		comp--;
	}
	else
	{
		$('#formContainer').append('<div class="form_erreur">Email invalide</div>');
	}
	
	if(isNaN(tel.value)){
		$('#formContainer').append('<div class="form_erreur">Le champ téléphone ne doit contenir que des chiffres</div>');
	}
	else
	{
		comp--;
	}
	
	if(tel.value.length<10 || tel.value.length>10){
		$('#formContainer').append('<div class="form_erreur">Le téléphone doit etre composer de 10 chiffres</div>');
	}
	else
	{
		comp--;
	}
	
	
	
	if(m2p.value.length<4){
		$('#formContainer').append('<div class="form_erreur">Votre mot de passe doit contenir au moins 4 caractères</div>');
	}
	else
	{
		comp--;
	}
	
	if(m2p.value != m2pConfirm.value){
		$('#formContainer').append('<div class="form_erreur">Vous n\'avez pas entrer le meme mot de passe pour la confirmation</div>');
	}
	else
	{
		comp--;
	}
	
	if(comp==0){
		document.inscription.submit();
		document.inscription.reset();
	}
}

window.onload = slideshow;