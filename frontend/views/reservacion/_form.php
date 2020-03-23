<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<style>
	.form-control{
		font-size: 12px;
	}
</style>
<?php $form = ActiveForm::begin([]); ?>


    
	<div class="row">
		<div class="col-md-11">
			<div class="row" id="row">
				<div class="col-md-2">
					<label>Entrada</label>
					<input class="form-control" type="date" name="fromdate[1]" id="">
				</div>
				<div class="col-md-2">
					<label>Salida</label>
					<input class="form-control" type="date" name="enddate[1]" id="">
				</div>
				<div class="col-md-1">
					<label>Cant.</label>
					<input class="form-control" type="number" name="cantidad[1]" id="">
				</div>
				<div class="col-md-1">
			        <?= $form->field($model, 'room_id')->dropDownList(
			            \yii\helpers\ArrayHelper::map(\frontend\models\RoomType::find()->all(), 'id', 'name'),
			            ['prompt'=>'Seleccionar...','id'=>'room-picker', 'name' => 'room[1]'])->label("Hab.") ?>
			    </div>
			    <div class="col-md-1">
					<label>A</label>
					<input class="form-control" type="number" name="adults[1]" id="">
				</div>
				<div class="col-md-1">
					<label>N</label>
					<input class="form-control" type="number" name="kid[1]" id="">
				</div>
				<div class="col-md-1">
					<label>B</label>
					<input class="form-control" type="number" name="bebes[1]" id="">
				</div>
				<div class="col-md-1">
					<label>P/P/N</label>
					<input class="form-control" type="number" name="ppn[1]" id="ppn_1">
				</div>
				<div class="col-md-2">
					<label>Total</label>
					<input class="form-control" type="number" name="total[1]" id="total_1">
				</div>
			    
			    
			</div>
			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-2">
					<label>Total</label>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
	</div>

	<div class="row mt-2">
		<div class="col-md-12">
			<a href="javascript:addReserva(2)" id='btn-reserva' class="btn btn-pink font-weight-bold"><i class="fas fa-plus"></i></a>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col-md-12 form-group text-right mt-5">
	        <?= Html::submitButton('Crear Reservación', ['class' => 'btn btn-primary btn-sm', 'name' => 'login-button']) ?>
	    </div>
	</div>

<?php ActiveForm::end(); ?>

