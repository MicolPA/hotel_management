<?php 
    use yii\widgets\ActiveForm;
    use yii\grid\GridView;

 ?>

<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Listado de Habitaciones</h2>
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
                    'value' => function ($data) {
                        if ($data->ocean_view == 1) {
                            return $data->type->name." Ocean View";
                        }else{
                            return $data->type->name;
                        }
                    },
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
                    'label' => 'Ocean view',
                  	'attribute' => 'ocean_view',
                    'value' => function ($data) {
                    	return $data->ocean_view==1?'Si':'No';
                    },
                ],
                [
                  'label' => 'Status',
                  'attribute' => 'status.name',
                ],
                [
                    'format'=>'html',
                    'label' => '',
                    'visible' => false,
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                    	if ($data->status_id == 1) {
                    		return "<a class='btn btn-success btn-sm' href='/reservacion/habitacion/?id=$data->id'>Reservar</a>";
                    	}
                    },
                ],

                [
                    'format'=>'html',
                    'label' => '',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                    	$ver = "<a class='btn btn-outline-dark btn-sm' href='/habitacion/ver/?id=$data->id' title ='Ver Habitación'><i class='fas fa-eye'></i></a>";
                    	$edit = "<a class='btn btn-outline-dark btn-sm' href='/habitacion/editar/?id=$data->id' title='Editar Habitación'><i class='fas fa-pencil-alt'></i></a>";
                    	$delete = "<a class='btn btn-outline-danger btn-sm' href='/habitacion/borrar/?id=$data->id' title ='Eliminar Habitación' data-confirm='¿Estás seguro de que desea elimianr esta habitación?' data-pjax='0' data-method='post'><i class='fas fa-trash'></i></a>";

                    	return "$ver $edit $delete";
                    },
                ],

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
	</div>

	
</div>
