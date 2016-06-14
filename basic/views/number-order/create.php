<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NumOrder */

$this->title = 'Create Num Order';
$this->params['breadcrumbs'][] = ['label' => 'Num Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
