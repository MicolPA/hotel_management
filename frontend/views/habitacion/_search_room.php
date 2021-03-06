<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(['method' => 'get']); ?>

    <div class="row">
    	<div class="col-md-2">
	    	<?= $form->field($model, 'people_capacity')->textInput(['type' => 'number'])->label('Capacidad de PAX') ?>
	    </div>
	    
	    <div class="col-md-2">
            <?= $form->field($model, 'ocean_view')->dropdownList(array(''=>'Seleccionar',0=>'No', 1=>'Si'), [])->label('Ocean View') ?>
	    	
	    </div>
	    <div class="col-md-2">
	    	<?= $form->field($model, 'type_id')->dropDownList(
	            \yii\helpers\ArrayHelper::map(\frontend\models\RoomType::find()->all(), 'id', 'name'),
	            ['prompt'=>'Seleccionar...',])->label("Tipo de Habitación") ?>
	    </div>
	    <div class="col-md-2">
	    	<?= $form->field($model, 'status_id')->dropDownList(
	            \yii\helpers\ArrayHelper::map(\frontend\models\RoomStatus::find()->all(), 'id', 'name'),
	            ['prompt'=>'Seleccionar...',])->label("Status") ?>
	    </div>
	    
	    <div class="col-md-2 form-group" style="padding-top: 2rem">
	        <?= Html::submitButton('Búscar', ['class' => 'btn btn-primary btn-sm', 'name' => 'login-button']) ?>
	    </div>
    </div>

<?php ActiveForm::end(); ?>