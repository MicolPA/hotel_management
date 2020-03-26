<?php
namespace common\models;

use Yii;
use yii\base\Model;

class Gestion extends Model
{


    public function checkLogin(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site']);
        }
    }


}
