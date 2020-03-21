<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;
use frontend\models\Reservation;

class ReservacionController extends \yii\web\Controller
{
	public function behaviors()
    {
        $this->layout = '@app/views/layouts/main-admin';

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCrear(){

    	$model = new Reservation();
        return $this->render('create',[
        	'model' => $model,
        ]);
    }

    public function actionHabitacion($id=null){

    }

}
