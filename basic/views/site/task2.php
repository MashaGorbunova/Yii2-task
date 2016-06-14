<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Задача 2';
?>
<div class="site-task2">
    <h1 class="text-info"><?= Html::encode($this->title) ?></h1>
    
	<div class="row">
	
	    <div class="col-lg-offset-1 col-lg-10">
		    <p class="text-justify text-primary"> <b>MySQL.</b> Создайте простую структуру в БД, для хранения информации о заказах в
                        ресторане. Сделайте ее такой, что бы потом мы могли смотреть список блюд, список
                        заказов, список блюд в заказе, показать 5 популярных блюд, имена официантов
                        выполнивших больше всех заказов.</p>
            <p class="text-justify text-danger"><b>Условия:</b> PK и FK обязательны, 3НФ тоже обязательна.	</p>
            <p class="text-justify text-muted"><b>Структура базы данных:</b></p>
			                <ol><li><p class="text-justify text-muted">Таблица dish - id, блюда, категория, стоимость. PK - id. Ссылка на таблицу - <a href="#" target="blank">code</a>.</p></li>
							<li><p class="text-justify text-muted">Таблица numberOrder - id, номер заказа. PK - id. Ссылка на таблицу - <a href="#" target="blank">code</a>.</p></li>
                            <li><p class="text-justify text-muted">Таблица waiter - id, имена официантов. PK - id. Ссылка на таблицу - <a href="#" target="blank">code</a>.</p></li> 
							<li><p class="text-justify text-muted">Таблица orders - id, блюдо, номер заказа. PK - id, FK - блюдо, номер заказа. Ссылка на таблицу - <a href="#" target="blank">code</a>.</p></li> 
							<li><p class="text-justify text-muted">Таблица service - заказ, имя официанта. PK - заказ, FK - заказ, имя официанта. Ссылка на таблицу - <a href="#" target="blank">code</a>.</p></li>
							</ol>
			<p class="text-justify text-muted">Ссылка на исходный код создания таблиц - <a href="#" target="blank">code</a>.</p>
			
			<p class="text-justify text-muted"><b>Выборка из таблиц:</b></p>
			                <ol><li><p class="text-justify text-muted">Создаем на каждую из таблиц в БД свою модель.</p></li>
							<li><p class="text-justify text-muted">В контроллере создаем <code>action</code> для формирвания запросов в БД с помощью создания объектов <code>ActiveDataProvider</code> (если запрос простой) или <code>SqlDataProvider</code> (если запрос сложный).</p></li>
                            <li><p class="text-justify text-muted">В вьюхе формируем отображение данных таблиц с помощью объекта <code>GridView</code>.</p></li> 
							</ol>
			
		</div>
	
	</div>
	
	<div class="row">
	
	    <h3 class="text-center text-danger">Примеры разных выборок из таблиц БД:</h3>
		
	</div>
	
	<div class="row">

		<div class="col-lg-6">
		
		    <p class="text-center text-success"><b>Таблица 1. Список блюд</b></p>
		    <?= GridView::widget([
                'dataProvider' => $dish,
                'columns' => [
                            'dish_name',
                            'dish_category',
                            'dish_cost',
                 ],
            ]); ?>
			
        </div>

        <div class="col-lg-6">
	
		    <p class="text-center text-success"><b>Таблица 2. Список блюд в заказе</b></p>
            <?= GridView::widget([
                'dataProvider' => $dish_in_order,
                'columns' => [
                            'dish_name',
                            'orders',	
                ],
            ]); ?>
			
        </div>

    </div>

    <div class="row">

        <div class="col-lg-6">
		
		    <p class="text-center text-success"><b>Таблица 3. 5 популярных блюд</b></p>
		    <?= GridView::widget([
                    'dataProvider' => $orders,
                    'columns' => [
                                'dish_name',
                                'dishCount',
                    ],
            ]); ?>
			
        </div>

        <div class="col-lg-6">
		
		    <p class="text-center text-success"><b>Таблица 4. Имена официантов, выполнивших больше всех заказов</b></p>
		    <?= GridView::widget([
                    'dataProvider' => $service,
                    'columns' => [
                                'waiter_name',
                                'orderCount',
                    ],
            ]); ?>
			
        </div>

	</div>

</div>
