<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Задача 1';
?>
<div class="site-task1">
    <h1 class="text-info"><?= Html::encode($this->title) ?></h1>
    
	<div class="row">
	
	    <div class="col-lg-offset-1 col-lg-10">
		    <p class="text-justify text-primary"> <b>PHP.</b> Создайте класс с методом, который позволить генерировать уникальные коды по
                        типу U8YE12GDS длинной в 10 символов состоящие только букв и цифр.</p>
            <p class="text-justify text-danger"><b>Условия:</b> Нельзя явно использовать перебор массива, нельзя написать строку алфавита
                        ($alp = ‘AaBbCcDd…’; и т.д.) и использовать ее как массив. В остальном Вы не ограничены.
                        В коде может быть любое количество цифр или букв в пределах 10 символов. Важно, что
                        бы родительский класс создавал уникальные неповторяющиеся коды.	</p>
            <p class="text-justify text-muted"><b>Решение:</b></p>
			                <ol><li><p class="text-justify text-muted">Создаем массивы, которые содержат алфавит (отдельно для заглавных букв, отдельно для 
			                прописных) и цифры (от 0 до 9) - функция <code>range()</code>.</p></li>
							<li><p class="text-justify text-muted">Объединяем массивы в один большой - функция <code>array_merge()</code>.</p></li>
                            <li><p class="text-justify text-muted">Перемешиваем элементы массива для большей уникальности кода - функция shuffle().</p></li> 
							<li><p class="text-justify text-muted">В случайном порядке выбираем 10 ключей для создания уникального кода - функция <code>array_rand()</code>.</p></li> 
							<li><p class="text-justify text-muted">С помощью цикла <code>while</code> получаем уникальный код согласно выбранных ранее 10 ключей.</p></li>
							</ol>
			<p class="text-justify text-muted">Ссылка на исходный код - <a href="#" target="blank">code</a>.</p>
			<p class="text-justify text-danger">Пример сгенерированого кода: <b><?= substr(Html::encode ($model), 0, 10)?></b></p>
							
		</div>
		
		<div class="col-lg-4">
		     <p class="text-justify text-primary">1.1 Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать его в код состоящий только из цифр.</p>
		    <p class="text-justify text-muted"><b>Решение:</b> </p>
			                <ol><li><p class="text-justify text-muted">Генерируем уникальный код по методу генерации кода в классе-родителе.</p></li>
							<li><p class="text-justify text-muted">В цикле <code>while</code> проверям является ли элемент массива числом. Если нет - заменяем букву на любую
							цифру от 0 до 9 - функция <code>rand()</code>.</p></li>
							</ol>
			<p class="text-justify text-muted">Ссылка на исходный код - <a href="#" target="blank">code</a>.</p>
			<p class="text-justify text-danger">Пример сгенерированого кода: <b><?= substr(Html::encode ($model), 11, 27)?></b></p>
						
		</div>
		<div class="col-lg-4">
		    <p class="text-justify text-primary">1.2 Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать его в код состоящий только из букв латинского
                            алфавита.</p>
		    <p class="text-justify text-muted"><b>Решение:</b></p>
			                <ol><li><p class="text-justify text-muted">Генерируем уникальный код по методу генерации кода в классе-родителе.</p></li>
							<li><p class="text-justify text-muted">В цикле <code>while</code> проверям является ли элемент массива числом. Если да - заменяем цифру на любую
							букву из массива алфавита, созданного по алгоритму класса-родителя.</p></li>
							</ol>
			<p class="text-justify text-muted">Ссылка на исходный код - <a href="#" target="blank">code</a>.</p>
			<p class="text-justify text-danger">Пример сгенерированого кода: <b><?= substr(Html::encode ($model), 39, 27)?></b></p>
							
		</div>
		<div class="col-lg-4">
		    <p class="text-justify text-primary">1.3* Создайте класс наследник, который будет использовать родительский метод для
                            получения кода и преобразовывать буквы латинского алфавита в буквы кириллического
                            алфавита не трогая цифры.</p>
		    <p class="text-justify text-muted"><b>Решение:</b></p>
			                <ol><li><p class="text-justify text-muted">Создаем массив из кириллицы - используем цикл <code>while</code> и обозначения букв
			                кириллицы в unicode.</p></li>
							<li><p class="text-justify text-muted">Создаем массив, где ключами есть латинские буквы, а значениями - кириллица. При чем каждому
                            латинскому символу отвечает такой же символ на кириллице - используем цикл <code>while</code> и условие <code>if</code>.</p></li>
                            <li><p class="text-justify text-muted">Генерируем уникальный код по методу генерации кода в классе-родителе.</p></li> 
							<li><p class="text-justify text-muted">В цикле <code>while</code> проверям является ли элемент массива числом. Если нет - заменяем латинскую
							букву на соответствующую ей букву кириллицы.</p></li>
							</ol>
			<p class="text-justify text-muted">Ссылка на исходный код - <a href="#" target="blank">code</a>.</p>
			<p class="text-justify text-danger">Пример сгенерированого кода: <b><?= substr(Html::encode ($model), 67, strlen(Html::encode ($model)))?></b></p>
							
		</div>

	</div>

</div>
