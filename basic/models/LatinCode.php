<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\GeneratorCode;


/**
* LatinCode is the model for convert unique code in letter code
*/

class LatinCode extends GeneratorCode {
	
	public $code = array ();
	
	/**
     * @return array with letter code.
     */
	function generationCode () {

		$this->code = parent::generationCode();
		
		$array_letter = parent::getAlphabetArray(); // add. array 
		
		shuffle($array_letter);
		
		$rand_keys = array_rand ($array_letter, CODE_LENGTH);
		
		$i=0; // counter
		
		while ($i<CODE_LENGTH) {
			if (is_int($this->code[$i])) {
				$this->code[$i] = $array_letter[$rand_keys[$i]];
			}
			
			$i++;
		}
		
		return $this->code;

	}
	
	/**
     * @return string with generation code.
     */
	public function generationCodeToString () {
		
		$code_parent = parent::generationCode();
		
		$array_letter = parent::getAlphabetArray(); // add. array 
		
		shuffle($array_letter);
		
		$rand_keys = array_rand ($array_letter, CODE_LENGTH);
		
		$this->code = $code_parent;
		
		$i=0; // counter
		
		while ($i<CODE_LENGTH) {
			if (is_int($this->code[$i])) {
				$this->code[$i] = $array_letter[$rand_keys[$i]];
			}
			
			$i++;
		}
		return implode($code_parent)." -> ".implode($this->code);
		
	}

}

?>	