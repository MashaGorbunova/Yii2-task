<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\Task1Form;
use app\models\Orders;
use app\models\Dish;
use app\models\Service;
use app\models\Waiter;
use app\models\NumOrder;

use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

	
	public function actionTask1()
    {
		$model = new Task1Form();
		
        return $this->render('task1', ['model'=>$model->results()]); 
		                                   
    }
	
	public function actionTask2()
    {
		$dish = new ActiveDataProvider([
                            'query' => Dish::find(),
	                        'pagination' => false,
                        ]);
						

        $dish_in_order = new SqlDataProvider([
    'sql' => 'SELECT dish.dish_name, orders ' . 
             'FROM orders ' .
             'INNER JOIN dish ON (dish.id = orders.dish_id) ' .
			 'ORDER BY orders DESC',
]);

        $orders = new SqlDataProvider([
    'sql' => 'SELECT dish.dish_name, COUNT(dish.dish_name) AS dishCount ' . 
             'FROM orders ' .
             'INNER JOIN dish ON (dish.id = orders.dish_id) ' .
             'GROUP BY dish.dish_name ' .
			 'ORDER BY COUNT(dish.dish_name) DESC ',
	'pagination' => [
        'pagesize' => 5,
    ],

]);
						
		$service = new SqlDataProvider([
    'sql' => 'SELECT waiter.waiter_name, COUNT(numberOrder.number_order) AS orderCount ' . 
             'FROM service ' .
             'INNER JOIN waiter ON (waiter.id = service.waiter_id) ' .
             'INNER JOIN numberOrder ON (numberOrder.id = service.order_id) ' .
             'GROUP BY waiter.waiter_name ' .
			 'ORDER BY COUNT(numberOrder.number_order) DESC',
]);

        return $this->render('task2', array ('dish'=>$dish, 'dish_in_order'=>$dish_in_order, 'orders'=>$orders, 'service'=>$service));
	
    }
	
	
	public function actionTask3()
    {
		
		$sum_money = new SqlDataProvider([
    'sql' => 'SELECT orders, SUM(dish.dish_cost) AS orderSum ' . 
             'FROM orders ' .
             'INNER JOIN dish ON (dish.id = orders.dish_id) ' .
             'GROUP BY orders ',
]);

		$last_orders = new SqlDataProvider([
    'sql' => 'SELECT dish.dish_name, orders ' . 
             'FROM orders ' .
             'INNER JOIN dish ON (dish.id = orders.dish_id) ' .
			 'INNER JOIN numberOrder ON (numberOrder.id = orders.orders) ' .
             'WHERE orders <= (SELECT MAX(number_order) FROM numberOrder) AND orders >= ((SELECT MAX(number_order) FROM numberOrder)-5) ' .
			 'ORDER BY orders DESC ',
	'pagination' => [
        'pagesize' => 20,
    ],

]);

		$orders = new SqlDataProvider([
    'sql' => 'SELECT dish.dish_name, COUNT(dish.dish_name) AS dishCount ' . 
             'FROM orders ' .
             'INNER JOIN dish ON (dish.id = orders.dish_id) ' .
             'GROUP BY dish.dish_name ' .
			 'ORDER BY COUNT(dish.dish_name) DESC ',
	'pagination' => [
        'pagesize' => 5,
    ],

]);
        return $this->render('task3', array ('sum_money'=>$sum_money, 'last_orders'=>$last_orders, 'orders'=>$orders));	
    }
	
	
}
