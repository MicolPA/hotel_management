<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

    <div class="row">
    	<div class="col-md-6">
	    	<?= $form->field($model, 'people_capacity')->textInput(['type' => 'number', 'required' => 'required'])->label('Capacidad de PAX') ?>
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'room_number')->textInput(['type' => 'number', 'id' => 'hab_number', 'required' => 'required'])->label('Número de hab.') ?>
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'bed')->textInput(['type' => 'number', 'required' => 'required'])->label('Cantidad de camas') ?>
	    </div>
	    
	    <div class="col-md-6">
	    	<?= $form->field($model, 'bed_description')->textInput(['required' => 'required'])->label('Descripción camas') ?>
	    </div>
	    <div class="col-md-6">
            <?= $form->field($model, 'ocean_view')->dropdownList(array(''=>'Seleccionar',0=>'No', 1=>'Si'), ['class'=>'form-control select2'])->label('Ocean View') ?>
	    	
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'type_id')->dropDownList(
	            \yii\helpers\ArrayHelper::map(\frontend\models\RoomType::find()->all(), 'id', 'name'),
	            ['prompt'=>'Seleccionar...','class'=>'form-control select2'])->label("Tipo de Habitación") ?>
	    </div>
	    <?php if (!isset($title)): ?>
	    <div class="col-md-12">
	    	<label>Imagen</label>
	    	<?= $form->field($model, 'imagen_url')->fileInput(['required' => 'required'])->label(false) ?>
	    </div>
	    <?php endif ?>
	    <div class="col-md-12">
	    	<?= $form->field($model, 'description')->textarea(['rows' => 4, 'required' => 'required'])->label('Descripción de la habitación') ?>
	    </div>
	    

    	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	    
	    
	    <div class="col-md-12 form-group text-right">
	        <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-pink mr-3">Cancelar</a> <?= Html::submitButton(isset($title)?"Guardar Cambios":"Registrar Habitación", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	    </div>
    </div>

<?php ActiveForm::end(); ?>