<?php

/* @var $this yii\web\View */

$this->title = 'My test task for CIFRUS';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 class="text-info">Здравствуйте!</h1>

        <p class="lead text-info">Предлагаю Вашему вниманию выполнение тестового задания.</p>
		
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2 class="text-info">Задача 1</h2>

                <p class="text-justify text-muted"><b>PHP.</b> Создайте класс с методом, который позволить генерировать уникальные коды по
                        типу U8YE12GDS длинной в 10 символов состоящие только букв и цифр.</p>
						<ol>
						<li><p class="text-justify text-muted">Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать его в код состоящий только из цифр.</p></li>
						<li><p class="text-justify text-muted">Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать его в код состоящий только из букв латинского
                            алфавита.</p></li>
						<li><p class="text-justify text-muted">*Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать буквы латинского алфавита в буквы кириллического
                            алфавита не трогая цифры.</p></li>
						</ol>

                <p><a class="btn btn-warning" href="/basic/web/site/task1">Посмотреть решение &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2 class="text-info">Задача 2</h2>

                <p class="text-justify text-muted"><b>MySQL.</b> Создайте простую структуру в БД, для хранения информации о заказах в
                        ресторане. Сделайте ее такой, что бы потом мы могли смотреть список блюд, список
                        заказов, список блюд в заказе, показать 5 популярных блюд, имена официантов
                        выполнивших больше всех заказов.</p>

                <p><a class="btn btn-warning" href="/basic/web/site/task2">Посмотреть решение &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2 class="text-info">Задача 3</h2>

                <p class="text-justify text-muted"><b>Динамическое обновление.</b> Создайте страничку, где владелец ресторана сможет
                        просматривать статистику работы его заведения. Воспользуйтесь структурой из
                        предыдущей задачи, для того что бы вывести следующие цифры: Сумма заработанных
                        денег за сегодня, список последних 5 заказов, 5 самых популярных блюд.</p>

                <p><a class="btn btn-warning" href="/basic/web/site/task3">Посмотреть решение &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
