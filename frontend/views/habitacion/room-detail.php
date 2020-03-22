<?php 
use yii\widgets\DetailView;

 ?>
 <style>
 	.swal-modal{
 		width: 50% !important;
 	}

 	.swal-modal img{
		width: 100% !important;
 	}
 </style>
<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Habitación #<?= $model->room_number ?> <a class='btn btn-pink mt-1' href="/habitacion/editar/?id=<?= $model->id ?>" title='Editar' style='float:right'>Editar</a></h2>
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
	                  'label' => 'Capacidad de PAX',
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
	                    'label' => 'Ocean view',
	                  	'attribute' => 'ocean_view',
	                    'value' => function ($data) {
	                    	return $data->ocean_view==1?'Si':'No';
	                    },
	                ],
	                [
	                  	'attribute' => 'street_view',
	                    'value' => function ($data) {
	                    	return $data->street_view==1?'Si':'No';
	                    },
	                ],
	                [
	                  	'attribute' => 'pool_view',
	                    'value' => function ($data) {
	                    	return $data->pool_view==1?'Si':'No';
	                    },
	                ],
	                [
	                    'label' => 'Foto',
	                  	'attribute' => 'imagen_url',
	                  	'format' => 'raw',
	                    'value' => function ($data) {
	                    	return "<a href='javascript:getImagen()' class='btn btn-primary btn-sm text-white'>Ver Imagen</a>";
	                    },
	                ],

	                [
	                  'label' => 'Descripción',
	                  'attribute' => 'description',
	                ],
                ],
            ]) ?>
	</div>

	<input type="hidden" id="img" value="<?= $model->imagen_url ?>">

	<div class="col-md-6" style="background-image: url(/frontend/web/<?= $model->imagen_url; ?>);background-repeat: no-repeat;height: 500px !important;display: none">
	</div>

	
</div>

<script>
	function getImagen(){
		url = $("#img").val();
		// url = "/frontend/web/"+url;
		console.log(url);
		swal({
            title: "",
            text: '',
            icon: '/'+url,
          });
	}
</script>