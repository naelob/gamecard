<?php	

function preTraiterChamp($champ) {
	 if (!empty($champ)) {
	   $champ = trim($champ);
	   $champ = htmlspecialchars($champ);
	 }
	 return $champ;
}
function pwdValide($password){	
	if (strlen($password) >= 6 && preg_match('/(?=.*[0-9])[A-Z]|(?=.*[A-Z])[0-9]/', $password)){
		return true;
	}
	else{
		return false;
	}
}
function preTraiter(&$donnees){
	$donnees["nom"]=preTraiterChamp($donnees["name"]);
	$donnees["username"]=preTraiterChamp($donnees["username"]);
	$donnees["email"]=preTraiterChamp($donnees["email"]);
	$donnees["password"]=preTraiterChamp($donnees["password"]);
}
	