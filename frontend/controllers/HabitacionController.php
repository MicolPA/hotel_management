<?php

namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use frontend\models\Room;
use frontend\models\RoomType;
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
    		
            if (Room::find()->where(['room_number' => $model->room_number])->one()) {
                Yii::$app->session->setFlash('fail1', "Ya existe una Habitación con este número");
            }else{

                $model->status_id = 1;

                $model->save();
                $model->imagen_url = UploadedFile::getInstance($model, 'imagen_url');
                $imagen = "images/room/" . strtolower($model->type->name) . "-$model->id." . $model->imagen_url->extension;
                $model->imagen_url->saveAs($imagen);
                $model->imagen_url = $imagen;

                if ($model->save()) {
                    Yii::$app->session->setFlash('success1', "Habitación registrada correctamente");
                    return $this->redirect(['crear']);
                }else{
                }
                    print_r($model->errors);

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
              ->andFilterWhere(['ocean_view' => $model['ocean_view']]);
        }

        $dataProvider = $this->getDataProvider($query);

        return $this->render('listado', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    	
    }

    public function actionEditar($id){

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('success1', "Cambios guardados correctamente");
            return $this->redirect(['listado']);
            
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionTipos(){

        $query = RoomType::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('types', [
            'dataProvider' => $dataProvider,
        ]);
        
    }

    public function actionEditarTipo($id){

        $model = $this->findTypeModel($id);
        if ($post = Yii::$app->request->post()) {
            $model->load($post);
            $model->save();
            Yii::$app->session->setFlash('success1', "Cambios guardados correctamente");
            return $this->redirect(['tipos']);

        }

        return $this->render('types-edit', [
            'model' => $model,
        ]);
    }

    public function actionVer($id){

    	$model = $this->findModel($id);

    	return $this->render('room-detail', [
            'model' => $model,
        ]);
    }

    public function findTypeModel($id){

        $model = RoomType::findOne($id);
        return $model?$model:false;
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
