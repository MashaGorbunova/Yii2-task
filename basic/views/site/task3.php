<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\NumberColumn;
use yii\widgets\Pjax;

$this->title = 'Задача 3';

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#ref").click(); }, 1000);
});
JS;
$this->registerJs($script);

?>

<div class="site-task3">

    <h1 class="text-info"><?= Html::encode($this->title) ?></h1>
    
	<div class="row">
	
	    <div class="col-lg-offset-1 col-lg-10">
		    <p class="text-justify text-primary"> <b>Динамическое обновление.</b> Создайте страничку, где владелец ресторана сможет
                        просматривать статистику работы его заведения. Воспользуйтесь структурой из
                        предыдущей задачи, для того что бы вывести следующие цифры: Сумма заработанных
                        денег за сегодня, список последних 5 заказов, 5 самых популярных блюд.</p>
            <p class="text-justify text-danger"><b>Условия:</b> Для реализации можете использовать AngularJS+Rest, сокеты, Comet или jQuery
                        Ajax. Обновление данных должно происходить без нажатия кнопки F5.</p>
			<p class="text-justify text-muted"><b>Решение:</b> Для динамического обновления страницы было использовано объект <code>Pjax</code>.
			            Обновление происходит каждую секунду. Если в таблицах произошли изменения, они моментально отображаются
						на странице статистики.</p>
		
		</div>
		
		<div class="col-lg-12">
		
            <h2 class="text-info text-center">Статистика работы заведения</h2>
			     
		<div class="row">
		
	        <?php Pjax::begin(); ?>
                <?= Html::a(" ", ['site/task3'], ['class' => 'hidden', 'id' => 'ref']) ?>
				
                <div class="col-lg-4">
				
                    <p class="text-center text-success"><b>Сумма заработаных денег</b></p>	
                    <?= GridView::widget([
                        'dataProvider' => $sum_money,
	                    'showFooter' => true,
                        'columns' => [
                                    'orders' => [
                                                'attribute' => 'orders',
		                                        'footer' => 'Total',
			                        ],
                                    'orderSum' => [
		                                        'class' => NumberColumn::className(),
                                                'attribute' => 'orderSum',
			                        ],
                        ],
                    ]); ?>
					
                </div>
				
                <div class="col-lg-4">
				
                    <p class="text-center text-success"><b>Список последних 5 заказов</b></p>
                    <?= GridView::widget([
                        'dataProvider' => $last_orders,
                        'columns' => [
                                    'dish_name',
                                    'orders',
                        ],
                    ]); ?>
					
                </div>
				
                <div class="col-lg-4">
				
                    <p class="text-center text-success"><b>5 самых популярных блюд</b></p>
                    <?= GridView::widget([
                        'dataProvider' => $orders,
                        'columns' => [
                                    'dish_name',
                                    'dishCount',
                        ],
                    ]); ?>
					
                </div>

            <?php Pjax::end(); ?>

        </div>
				 
		</div>
	
	</div>

</div>
