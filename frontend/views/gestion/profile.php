<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$fecha = new DateTime();
$fecha->setTimestamp($model->created_at);
?>
<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Perfil de usuario</h2>
		<hr>
	</div>
</div>

<?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'on'],], ['enctype' => 'multipart/form-data']); ?>
<div class="row">
	<div class="col-md-2">
		<div class="row">
			<div class="col-md-12 rounded-circle" style="height:200px;background-image: url(/<?= $model->photo_url ?>);background-size: cover;">
				<!-- <img src="/frontend/web/images/users/default-user.png" width="100%"> -->
			</div>

			<div class="col-md-12 text-center rounded mt-2">
				<a href="" class="btn btn-pink text-white btn-block"  data-toggle="modal" data-target="#photoModal">Actualizar foto</a>
			</div>
		</div>
	</div>

	<div class="col-md-10 pl-5">

		<div class="row">
			<div class="col-md-12 mb-2">
				<p class="h4 font-weight-normal text-pink">Información Personal</p>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'name')->textInput([])->label('Nombre') ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'last_name')->textInput([])->label('Apellido') ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'identity')->textInput(['id' => 'identity'])->label('Cédula') ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'phone')->textInput(['id' => 'phone'])->label('Celular') ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'email')->textInput([])->label('Correo electrónico') ?>
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'address')->textInput([])->label('Dirección') ?>
			</div>
			<div class="col-md-12">
				<label>Fecha de entrada</label>
				<input type="text" class="form-control" value="<?= $fecha->format('d/m/Y') ?>" readonly>
			</div>

			<div class="col-md-12 mt-4 mb-2">
				<p class="h4 font-weight-normal text-pink">Credenciales</p>
			</div>
			<div class="col-md-12">
	    		<?= $form->field($model, 'username')->textInput([])->label('Nombre de Usuario') ?>
			</div>
		</div>
		
	</div>
	<div class="modal" tabindex="-1" role="dialog" id="photoModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <p class="h4 font-weight-normal mb-4">Selecciona una foto de perfil</p>
	       <?= $form->field($model, 'photo_url')->fileInput(['class' => 'mt-4'])->label(false) ?>
	      </div>
	      <div class="modal-footer" style="border: 0px">
	        <button type="submit" class="btn btn-primary">Subir Foto</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="col-md-12 form-group text-right">
        <a href="<?= Yii::$app->request->referrer ?>" class="btn btn-pink mr-3">Cancelar</a> 
        <?= Html::submitButton("Guardar Cambios", ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
