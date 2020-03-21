<?php 
    use yii\widgets\ActiveForm;
    use yii\grid\GridView;

 ?>
<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-light">Listado de Habitaciones</h2>
		<hr>
	</div>

	<div class="col-md-12 table-responsive">
        <?php echo $this->render('_search_room', ['model' => $model]); ?>
		<?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                  'label' => 'Tipo',
                  'attribute' => 'type.name',
                ],
                [
                  'label' => 'Capacidad Personas',
                  'attribute' => 'people_capacity',
                ],
                [
                  'label' => 'Cant. Camas',
                  'attribute' => 'bed',
                ],
                [
                    'label' => 'Baño compartido',
                  	'attribute' => 'share_bathroom',
                    'value' => function ($data) {
                    	return $data->share_bathroom==1?'Si':'No';
                    },
                ],
                [
                  'label' => 'Status',
                  'attribute' => 'status.name',
                ],
                [
                    'format'=>'html',
                    'label' => '',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                    	if ($data->status_id == 1) {
                    		return "<a class='btn btn-success btn-sm' href='/reservacion/habitacion/?id=$data->id'>Reservar</a>";
                    	}
                    },
                ],

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
	</div>

	
</div>
