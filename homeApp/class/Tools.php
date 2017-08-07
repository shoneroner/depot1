<?php

class Tools {

	public static function convertOctets($octets, $precision = 2)
	{
		$unit = ["Octets", "KO", "Mo", "Go"];
    	$exp = floor(log($octets, 1024)) | 0;
    	if($octets != 0) {
    		return round($octets / (pow(1024, $exp)), $precision) . ' ' . $unit[$exp];
    	} else {
    		return 0 . ' Octets';
    	}
    	
	}

	public static function GetSize($Rep)
	{

		$Racine = opendir($Rep);
        $Taille = 0;

        while($Dossier = readdir($Racine)) {
            if($Dossier != '..' And $Dossier != '.') {
                if(is_dir($Rep . '/' . $Dossier)) {
                	$Taille += SELF::GetSize($Rep . '/' . $Dossier );
                } else {
                	$Taille += filesize($Rep . '/' . $Dossier);
                }
            }
        }

        closedir($Racine);
        return $Taille;
	}

}