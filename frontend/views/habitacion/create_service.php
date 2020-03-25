<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>


<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary"><?= $title ?>
		</h2>
		<hr>
	</div>
</div>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'on'],], []); ?>

    <div class="row">
    	<div class="col-md-6">
	    	<?= $form->field($model, 'name')->textInput([ 'required' => 'required']) ?>
	    </div>
	    <div class="col-md-6">
	    	<label>Precio</label>
	    	<div class="input-group">
			  <input type="number" class="form-control" name="price" value="<?= $model->price ?>" required>
			  <div class="input-group-append">
			    <span class="input-group-text">$</span>
			  </div>
			</div>
	    </div>
	    <div class="col-md-12">
	    	<?= $form->field($model, 'description')->textarea(['rows' => 4, 'required' => 'required'])->label('Descripción del servicio') ?>
	    </div>
	    

    	<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
	    
	    
	    <div class="col-md-12 form-group text-right">
	        <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-pink mr-3">Cancelar</a> 
	        <?= Html::submitButton(isset($title)?"Guardar Cambios":"Registrar Servicio", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
	    </div>
    </div>

<?php ActiveForm::end(); ?>