<?php 
    use yii\widgets\ActiveForm;
    use yii\grid\GridView;

 ?>

<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Tipos de Habitaciones</h2>
		<hr>
	</div>

	<div class="col-md-12 table-responsive">
		<?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'label' => 'Tipo',
                    'attribute' => 'name',
                ],
                [
                  'label' => 'Descripción',
                  'attribute' => 'description',
                ],

                [
                    'format'=>'html',
                    'label' => '',
                    'class' => 'yii\grid\DataColumn', 
                    'value' => function ($data) {
                    	$edit = "<a class='btn btn-outline-dark btn-sm' href='/habitacion/editar-tipo/?id=$data->id' title='Editar Habitación'><i class='fas fa-pencil-alt'></i></a>";
                    	$delete = "<a class='btn btn-outline-danger btn-sm' href='/habitacion/borrar/?id=$data->id' title ='Eliminar Habitación' data-confirm='¿Estás seguro de que desea elimianr esta habitación?' data-pjax='0' data-method='post'><i class='fas fa-trash'></i></a>";

                    	return "$edit";
                    },
                ],

                // ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
	</div>

	
</div>
