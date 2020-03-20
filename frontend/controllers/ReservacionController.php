<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;

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

}
