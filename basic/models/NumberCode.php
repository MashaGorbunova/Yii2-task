<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\GeneratorCode;


/**
* NumberCode is the model for convert unique code in number code
*/

class NumberCode extends GeneratorCode {
	
	public $code = array ();
	
	/**
     * @return array with number code.
     */
	public function generationCode () {

		$this->code = parent::generationCode();
		
		$i=0; // counter
		
		while ($i<CODE_LENGTH) { // ???
			if (!is_int($this->code[$i])) {
				$this->code[$i] = rand (0,9);
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

		$this->code = $code_parent;
		$i=0; // counter
		
		while ($i<CODE_LENGTH) {
			if (!is_int($this->code[$i])) {
				$this->code[$i] = rand (0,9);
			}
			
			$i++;
		}
		return implode($code_parent)." -> ".implode($this->code);
	}

}

?>	