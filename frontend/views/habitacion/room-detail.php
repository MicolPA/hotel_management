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
	<div class="col-md-6">
		<img src="/frontend/web/<?= $model->imagen_url ?>" width='100%'>
		<div class="mt-2">
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Descripción</span>
			<p class="h4 font-weight-light"><?= $model->description; ?></p>
		</div>
		</div>
	</div>
	<div class="col-md-6">
		
		<div>
			<span class="font-weight-bold h5 text-primary">Tipo</span>
			<p class="h4 font-weight-light"><?= $model->ocean_view==0?$model->type->name:$model->type->name." Ocean View" ?></p>
		</div>
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Status</span>
			<p class="h4 font-weight-light"><?= $model->status->name; ?></p>
		</div>
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Capacidad de PAX</span>
			<p class="h4 font-weight-light"><?= $model->people_capacity; ?> Persona(s)</p>
		</div>
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Cant. de Camas</span>
			<p class="h4 font-weight-light"><?= $model->bed; ?> Cama(s)</p>
		</div>
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Descripción de Camas</span>
			<p class="h4 font-weight-light"><?= $model->bed_description; ?></p>
		</div>
		<div class="mt-4">
			<span class="font-weight-bold h5 text-primary">Vistas</span><br><br>
			<?php if ($model->ocean_view == 1): ?>
				<span class="h6 font-weight-light rounded border border-primary pt-1 pb-1 pl-2 pr-2 mr-2"><i class="fas fa-water text-primary"></i> Ocean View</span>
			<?php endif ?>
			<?php if ($model->pool_view == 1): ?>
			<span class="h6 font-weight-light rounded border border-success pt-1 pb-1 pl-2 pr-2 mr-2"><i class="fas fa-swimmer text-success"></i> Pool View</span>	
			<?php endif ?>
			<?php if ($model->street_view == 1): ?>
			<span class="h6 font-weight-light rounded pt-1 pb-1 pl-2 pr-2" style="border:1px solid #f67575"><i class="fas fa-city text-pink"></i> Street View</span>	
			<?php endif ?>
		</div>

	</div>

	<div class="col-md-6" style="display: none">
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