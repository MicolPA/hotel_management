<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row mb-4">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Editar tipo de Habitación</h2>
		<hr>
	</div>
</div>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off'],]); ?>

    <div class="row">
    	<div class="col-md-4">
	    	<?= $form->field($model, 'name')->textInput(['required' => 'required'])->label('Tipo de Habitación') ?>
	    </div>
	    <div class="col-md-4">
	    	<?= $form->field($model, 'initials')->textInput(['required' => 'required'])->label('Siglas') ?>
	    </div>
	    <div class="col-md-4">
	    	<?= $form->field($model, 'price_per_night')->textInput(['required' => 'required'])->label('Precio por Noche') ?>
	    </div>
	    <div class="col-md-12">
	    	<?= $form->field($model, 'description')->textarea(['rows' => 4, 'required' => 'required'])->label('Descripción de la habitación') ?>
	    </div>
    	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	    <div class="col-md-12 form-group text-right">
	        <a href="/habitacion/tipos" class="btn btn-pink mr-3">Cancelar</a> <?= Html::submitButton('Guardar Cambios', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	    </div>
    </div>

<?php ActiveForm::end(); ?>