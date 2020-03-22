<?php

namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use frontend\models\Room;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class HabitacionController extends \yii\web\Controller
{
    	

	public function behaviors()
    {
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCrear(){

    	$model = new Room();
    	$post = Yii::$app->request->post();

    	if ($model->load($post)) {
    		
    		$model->status_id = 1;

    		$model->save();
    		$model->imagen_url = UploadedFile::getInstance($model, 'imagen_url');
            $imagen = "images/room/" . $model->type->name . "-$model->id." . $model->imagen_url->extension;
            $model->imagen_url->saveAs($imagen);
            $model->imagen_url = $imagen;

            if ($model->save()) {
            	Yii::$app->session->setFlash('success1', "Habitación registrada correctamente");
            	return $this->redirect(['crear']);
            }

    	}

        return $this->render('create',[
        	'model' => $model,
        ]);
    }

    public function actionListado(){

    	$query = Room::find();
        $model = new Room();

        if ($get = Yii::$app->request->get()) {
            
            $model->load($get);

            $query->andFilterWhere(['people_capacity' => $model['people_capacity']])
              ->andFilterWhere(['bed' => $model['bed']])
              ->andFilterWhere(['type_id' => $model['type_id']])
              ->andFilterWhere(['status_id' => $model['status_id']])
              ->andFilterWhere(['share_bathroom' => $model['share_bathroom']]);
        }

        $dataProvider = $this->getDataProvider($query);

        return $this->render('listado', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    	
    }

    public function actionVer($id){

    	$model = $this->findModel($id);

    	return $this->render('room-detail', [
            'model' => $model,
        ]);
    }


    public function findModel($id){

    	$model = Room::findOne($id);
    	return $model?$model:false;
    }

    public function getDataProvider($query){
    	
    	$dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => 'ASC']],
            'pagination'=>['pageSize' => '60'],
        ]);

        return $dataProvider;
    }

}
