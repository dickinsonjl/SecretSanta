<?php

class Ss {

	private $santas = array();
	private $taken = array();


	public function __construct($numberOfSantas = 0) {
		for ($i=0; $i < $numberOfSantas; $i++) { 
			addSanta($i, $i . '@santa');
		}
    }

	public function addSanta($name, $email){
		$this->santas[] = array($name, $email, null);
	}


	public function doHatPick(){
		// store available numbers in array
		$available = array();
		// store taken numbers from hat in array
		$this->taken = array();
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
			$this->taken[] = $result;
			// remove number from available
			$key = array_search($result,$available);
			if($key!==false){
			    unset($available[$key]);
			    $available = array_values($available);
			}
		}
		//process last pick
		if($available[0] == count($this->santas)){
			//last choice is last santa, swap with random santa
			$swapWith = mt_rand(0, count($this->taken) - 1);
			$this->taken[] = $this->taken[$swapWith];
			$this->taken[$swapWith] = $available[0];


		} else {
			//last pick is not last santa, take that pick
			$this->taken[] = $available[0];
			unset($available); // none left
		}
	}

	public function getRawResult(){
		print_r($this->taken);
	}
}


?>
