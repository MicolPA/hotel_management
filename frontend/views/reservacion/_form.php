<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'reservation-form']); ?>


    

    <div class="form-group">
        <?= $form->field($model, 'room_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\frontend\models\Room::find()->all(), 'id', 'description'),
            ['prompt'=>'Seleccionar...','id'=>'room-picker'])->label("Habitación") ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Crear Reservación', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>

<?php ActiveForm::end(); ?>