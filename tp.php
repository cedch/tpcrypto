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

function i2c($indice = 1, $nbLettreMin = 5, $nbLettreMax = 8){
    $indiceperso = array("a"=>0,"b"=>1,"c"=>2,"d"=>3,"e"=>4,"f"=>5,"g"=>6,"h"=>7,"i"=>8,"j"=>9,"k"=>10,"l"=>11,"m"=>12,"n"=>13,"o"=>14,"p"=>15,"q"=>16,"r"=>17,"s"=>18,"t"=>19,"u"=>20,"v"=>21,"w"=>22,"x"=>23,"y"=>24,"z"=>25,"0"=>26,"1"=>27,"2"=>28,"3"=>29,"4"=>30,"5"=>31,"6"=>32,"7"=>33,"8"=>34,"9"=>35);

    $indiceLettre = array();
    $texteClair = "";
    $nbLettre = $nbLettreMin;
    do{
        if($indice < pow(36, $nbLettre)) {
            for($j=0;$j<$nbLettre;$j++) {
                $texteClair = array_search($indice%36, $indiceperso).$texteClair;
                $indice = (int)($indice/36);
            }
        }
        else {
            $indice = $indice - pow(36, $nbLettre);
        }
        $nbLettre++;
    }while($texteClair=="" && $nbLettre<=$nbLettreMax);

	return $texteClair;

}

function h($chaineACrypter, $algoCryptage) {
    switch($algoCryptage) {
        case "md5":
            return md5($chaineACrypter);
            break;
        case "sha":
            return sha1($chaineACrypter);
            break;
    }
}

function h2i($y, $t) {
    //y sur 16 octets (32 caracteres hexa)
    $N = pow(36, 5) + pow(36, 6) + pow(36, 7) + pow(36, 8); //Nombre de clairs possibles
   // $y = hexdec($y);
    $byte_array = unpack(hex2bin($y));
    var_dump(strval(hexdec($y[0].$y[1].$y[2].$y[3].$y[4].$y[5].$y[6].$y[7].$y[8].$y[9].$y[10].$y[11].$y[12].$y[13].$y[14].$y[15])));die();
    foreach($byte_array as $octet) {

    }
    return (($y + $t) % N);
}

echo h2i(h("qsdkjsqkd", "md5"), 2);
echo('<br/>');
echo c2i($string);
echo('<br/>');
echo i2c(749467555);


//Fonction de hashage

//Dictionnaire intégrale




?>