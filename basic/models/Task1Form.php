<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\GeneratorCode;
use app\models\NumberCode;
use app\models\LatinCode;
use app\models\Cyrilic;


class Task1Form extends Model {
	
	/**
     * @return string with examples of code.
     */
	public function results () {
		
	$parent = new GeneratorCode ();
	$number = new NumberCode ();
	$latin = new LatinCode ();
	$cyrilic = new CyrilicCode ();

	return $parent->generationCodeToString().",".$number->generationCodeToString()."," .
	       $latin->generationCodeToString().",".$cyrilic->generationCodeToString();
	
	}
	
}

?>