<?php

namespace app\models;

use Yii;
use yii\base\Model;

define ("CODE_LENGTH", "10");

/**
* GeneratorCode is the model for generation unique code
*/

class GeneratorCode extends Model {
	
	private $array_alphabet_upper = array();    // array with upper chars
	private $array_alphabet_lower = array(); // array with lower chars
	private $array_number = array(); // array with number
	
	public $code = array();

	
	/**
     * @return array with upper and lower chars of alphabet.
     */
	public function getAlphabetArray () {
		 
		$array =  array_merge($this->array_alphabet_upper=range('A', 'Z'), $this->array_alphabet_lower=range('a', 'z'));
		return $array;
	}
	
	/**
     * @return array with upper and lower chars of alphabet and numbers.
     */
	public function getAlphabetNumberArray () {
		
		return array_merge($this->getAlphabetArray(), $this->array_number=range(0,9));
	}
	
	/**
     * @return array with generation code.
     */
	public function generationCode () {
		
	    $array = $this->getAlphabetNumberArray(); // add. array
		
		shuffle($array); // shuffle all keys in this array
		
		$rand_keys = array_rand ($array, CODE_LENGTH); // random chosing any 10 keys from add. array

		$i=0; // counter
		while ($i<CODE_LENGTH) {
			$this->code[$i] = $array[$rand_keys[$i]];
			$i++;
		}
		
		return $this->code;
	}
	
	/**
     * @return string with generation code.
     */
	public function generationCodeToString () {
		return implode($this->generationCode());
	}
	
}

?>