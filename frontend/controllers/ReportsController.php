<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Room;
use frontend\models\RoomStatus;
use yii\filters\VerbFilter;

class ReportsController extends \yii\web\Controller
{
	public function behaviors()
    {
        $this->checkLogin();
        $this->layout = '@app/views/layouts/main-admin';
        $user = Yii::$app->user->identity;;
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function checkLogin(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site']);
        }
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRack(){
    	$model = Room::find()->orderBy(['room_number' => SORT_ASC])->all();
    	$status = RoomStatus::find()->all();
        return $this->render('rack',[
        	'model' => $model,
        	'status' => $status,
        ]);

    }

}
