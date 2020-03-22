<div class="row">
	<div class="col-md-12 pl-0">
		<h2 class="h2 font-weight-light">Habitación</h2>
		<hr>
	</div>

	<div class="col-md-4 h-50" style="background-image: url(/frontend/web/<?= $model->imagen_url; ?>)">
		<a href="javascript:imagenbigger()" class="btn">Ver imagen</a>
	</div>

	<div class="col-md-8">
		<?= $model->people_capacity ?>
	</div>
</div>