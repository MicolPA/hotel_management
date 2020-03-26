<?php

namespace frontend\controllers;

use Yii;
use common\models\Gestion;
use frontend\models\User;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class GestionController extends \yii\web\Controller
{
	public function behaviors()
    {
    	$this->checkLogin();
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

    public function checkLogin(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site']);
        }
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPerfil($id=null){
    	$id = $id?$id:Yii::$app->user->identity->id;
    	$model = User::findOne($id);
    	if ($model->load($post = Yii::$app->request->post())) {
    		$model->photo_url = UploadedFile::getInstance($model, 'photo_url');
            $imagen = "images/users/" . strtolower($model->username) . "-profile_foto-" . date("Y-m-d") . "." . $model->photo_url->extension;
            $model->photo_url->saveAs($imagen);
            $model->photo_url = $imagen;
    		$model->save();
            Yii::$app->session->setFlash('success1', "Información actualizada correctamente");
    		return $this->redirect(['perfil', 'id' => $id]);
    	}
        return $this->render('profile', [
        	'model' => $model,
        ]);

    }

}
