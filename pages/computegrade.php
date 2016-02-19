<?php

	function fnAverage($dblGotFilipino, $dblGotMath, $dblGotScience, $dblGotEnglish, $dblGotMakabayan){
		$dblAverageCtr = 0;
		if(!is_null($dblGotFilipino) && $dblGotFilipino != 0){
			$dblAverageCtr++;
		}
		if(!is_null($dblGotMath) && $dblGotMath != 0){
			$dblAverageCtr++;
		}
		if(!is_null($dblGotScience) && $dblGotScience != 0){
			$dblAverageCtr++;
		}
		if(!is_null($dblGotEnglish) && $dblGotEnglish != 0){
			$dblAverageCtr++;
		}
		if(!is_null($dblGotMakabayan) && $dblGotMakabayan != 0){
			$dblAverageCtr++;
		}
		$dblAverage = ($dblGotFilipino + $dblGotMath + $dblGotScience + $dblGotEnglish + $dblGotMakabayan) / $dblAverageCtr;
		return $dblAverage;
	}

?>