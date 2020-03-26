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

    public function getFecha(){
    	$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
		return $diassemana[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    }


}
