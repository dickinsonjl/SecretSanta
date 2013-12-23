<?php

class Ss {

	private $santas = array();


	public function __construct($numberOfSantas = 0) {
		
    }

	public function addSanta($name, $email){
		$this->santas[] = array($name, $email, null);
	}


	public function doHatPick(){
		// store available numbers in array
		$available = array();
		// store taken numbers from hat in array
		$taken = array();
		for ($x=0; $x < count($this->santas); $x++) { 
			$available[] = $x;
		}
		// process all but last santa pick
		for ($x=0; $x < count($this->santas) - 1; $x++) { 
			$tempHat = $available;
			// remove current santa from tempHat
			$key = array_search($x,$tempHat);
			if($key!==false){
			    unset($tempHat[$key]);
			    $tempHat = array_values($tempHat);
			}
			// random pick out of tempHat
			$result = $x;
			while ($result == $x) {
				$pick = mt_rand(0, count($tempHat) - 1);
				$result = $tempHat[$pick];
			}
			// add number to taken
			$taken[] = $result;
			// remove number from available
			$key = array_search($result,$available);
			if($key!==false){
			    unset($available[$key]);
			    $available = array_values($available);
			}
		}
	}


}



?>
