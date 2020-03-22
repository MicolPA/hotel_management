<?php 
use yii\widgets\DetailView;

 ?>
<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Habitación #<?= $model->room_number ?></h2>
		<hr>
	</div>
	<div class="col-md-12">
		<?= DetailView::widget([
                'model' => $model,
                'attributes' => [
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
	                    'label' => 'Status',
	                  	'attribute' => 'ocean_view',
	                  	'format' => 'raw',
	                    'value' => function ($data) {
	                    	$status = $data->status->name;
	                    	$class = '';
	                    	if ($data->status_id == 1) {
	                    		$class = 'text-success';
	                    	}

	                    	if ($data->status_id == 3) {
	                    		$class = 'text-primary';
	                    	}
	                    	return "<span class='font-weight-bold $class'>$status</span>";
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
	                  'attribute' => 'bed_description',
	                ],
	                [
	                  'label' => 'Cant. Baños',
	                  'attribute' => 'bathroom',
	                ],
	                [
	                    'label' => 'Ocean view',
	                  	'attribute' => 'ocean_view',
	                    'value' => function ($data) {
	                    	return $data->share_bathroom==1?'Si':'No';
	                    },
	                ],

	                [
	                  'label' => 'Descripción',
	                  'attribute' => 'description',
	                ],
                ],
            ]) ?>
	</div>

	<div class="col-md-6" style="background-image: url(/frontend/web/<?= $model->imagen_url; ?>);background-repeat: no-repeat;height: 500px !important;display: none">
	</div>

	
</div>