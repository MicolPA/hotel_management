<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],], ['enctype' => 'multipart/form-data']); ?>

    <div class="row">
    	<div class="col-md-6">
	    	<?= $form->field($model, 'people_capacity')->textInput(['type' => 'number'])->label('Capacidad de personas') ?>
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'bathroom')->textInput(['type' => 'number'])->label('Cantidad de Baños') ?>
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'bed')->textInput(['type' => 'number'])->label('Cantidad de camas') ?>
	    </div>
	    
	    <div class="col-md-6">
	    	<?= $form->field($model, 'bed_description')->textInput([])->label('Descripción camas') ?>
	    </div>
	    <div class="col-md-6">
            <?= $form->field($model, 'share_bathroom')->dropdownList(array(''=>'Seleccionar',0=>'No', 1=>'Si'), ['class'=>'form-control select2'])->label('Baño compartido') ?>
	    	
	    </div>
	    <div class="col-md-6">
	    	<?= $form->field($model, 'type_id')->dropDownList(
	            \yii\helpers\ArrayHelper::map(\frontend\models\RoomType::find()->all(), 'id', 'name'),
	            ['prompt'=>'Seleccionar...','class'=>'form-control select2'])->label("Tipo de Habitación") ?>
	    </div>
	    <div class="col-md-12">
	    	<?= $form->field($model, 'description')->textarea(['rows' => 4])->label('Descripción de la habitación') ?>
	    </div>
	    <div class="col-md-12">
	    	<label>Imagen</label>
	    	<?= $form->field($model, 'imagen_url')->fileInput()->label(false) ?>
	    </div>

    	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	    
	    
	    <div class="col-md-12 form-group">
	        <?= Html::submitButton('Registrar Habitación', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	    </div>
    </div>

<?php ActiveForm::end(); ?>