<?php 
?>

<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Editar Habitación $<?= $model->room_number ?></h2>
		<hr>
	</div>

	
</div>
<?= $this->render('_create_form', ['model' => $model, 'title' => 'Guardar Cambios']) ?>
