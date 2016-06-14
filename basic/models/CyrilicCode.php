<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\GeneratorCode;


/**
* CyrilicCode is the model for convert unique code in cyrilic code
*/

class CyrilicCode extends GeneratorCode {
	
	public $code = array ();
	private $array_convert = array();
	private $array_cyrilic = array();
	
	/**
     * @return array with upper and lower chars of cyrilic alphabet.
     */
	public function getCyrilicArray () {
		
		$count = 0; // index in array
		
		$i=144;
 
		while($i<192) {
				$this->array_cyrilic[$count++]=chr(208).chr($i++);		
		}
		
		$j=128;
 
		while($j<144) {
				$this->array_cyrilic[$count++]=chr(209).chr($j++);		
		}
		
		return $this->array_cyrilic;
	}
	

	
	
	/**
     * @return associative array keys is latin chars, values is cyrilic chars.
     */
	public function getConvertArray () {
		
		$array_cyrilic = $this->getCyrilicArray();
		
		$array_latin = parent::getAlphabetArray();
		
		$i=0; // counter
		
		while ($i<count($array_latin)) {
			
			if ($i==0 || $i==1 || ($i>=8 and $i<=15)) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i];
			}
			if ($i==2) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[22];
			}
			if ($i==3 || $i==4) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i+1];
			}
			if ($i==5) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[20];
			}
			if ($i==6 || $i==7) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[3];
			}
			if ($i==16) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[10];
			}
			if ($i>=17 and $i<=20) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i-1];
			}
			if ($i==21 || $i==22) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[2];
			}
			if ($i==23) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[21];
			}
			if ($i==24) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[27];
			}
			if ($i==25) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[7];
			}
			if ($i==26 || $i==27 || ($i>=34 and $i<=41)) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i+6];
			}
			if ($i==28) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[54];
			}
			if ($i==29 || $i==30) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i+7];
			}
			if ($i==31) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[52];
			}
			if ($i==32 || $i==33) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[35];
			}
			if ($i==42) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[42];
			}
			if ($i>=43 and $i<=46) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[$i+5];
			}
			if ($i==47 || $i==48) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[34];
			}
			if ($i==49) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[53];
			}
			if ($i==50) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[59];
			}
			if ($i==51) {
				$this->array_convert[$array_latin[$i]]=$array_cyrilic[39];
			}
									
			$i++;
			
		}
		
		return $this->array_convert;
	}
	
	/**
     * @return array with cyrilic code.
     */
	public function generationCode () {

		$this->code = parent::generationCode();
		
		$this->array_convert = $this->getConvertArray(); // add. array 
		
		$i=0; // counter
		
		while ($i<CODE_LENGTH) {
			if (!is_int($this->code[$i])) {
				$this->code[$i] = $this->array_convert[$this->code[$i]];
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
		
		$this->array_convert = $this->getConvertArray(); // add. array 
		
		$i=0; // counter
		
		while ($i<CODE_LENGTH) {
			if (!is_int($code_parent[$i])) {
				$this->code[$i] = $this->array_convert[$code_parent[$i]];
			}
			
			$i++;
		}
		
		return implode($code_parent)." -> ".implode($this->code);

	}


}

?>	