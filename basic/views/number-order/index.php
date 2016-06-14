<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NumOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Num Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Num Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
