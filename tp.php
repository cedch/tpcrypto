<?php  

$string = "aaa0a";
//$stringToDecode = md5("connard");

//Attaque par compromis temps-memoire

//Espace des textes clairs

function c2i($string){
	$indice = 0;
	$indiceperso = array("a"=>0,"b"=>1,"c"=>2,"d"=>3,"e"=>4,"f"=>5,"g"=>6,"h"=>7,"i"=>8,"j"=>9,"k"=>10,"l"=>11,"m"=>12,"n"=>13,"o"=>14,"p"=>15,"q"=>16,"r"=>17,"s"=>18,"t"=>19,"u"=>20,"v"=>21,"w"=>22,"x"=>23,"y"=>24,"z"=>25,"0"=>26,"1"=>27,"2"=>28,"3"=>29,"4"=>30,"5"=>31,"6"=>32,"7"=>33,"8"=>34,"9"=>35);
	$notA = true;
	
	for($j=0;$j<strlen($string);$j++){
		if(substr($string,$j,1)!="a")
			$notA = false;
	}
	
	
	if($notA==false){
		$placement = 0;
		for($i = strlen($string)-1;$i>=0;$i--){
			
			$lettre = substr($string,$i,1);
			
			if($lettre!="a"){
				if($i==strlen($string)-1){
					$indice = $indice + $indiceperso[$lettre];
				}else{
					$indice = $indice + pow(36,$placement) * $indiceperso[$lettre];
				}
			}
			$placement++;
		}
	}else{
		if(strlen($string) == 5)
			$indice = 0;
		else
			$indice = pow(36,strlen($string)-1)-1;
	}
	
	return $indice;
}		

function i2c($indice){

	$string = "";



	return $string;
	
}

echo c2i($string);
echo i2c(1);


//Fonction de hashage

//Dictionnaire intégrale




?>