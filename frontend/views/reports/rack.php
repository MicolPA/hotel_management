<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Rooming list</h2>
		<hr>
	</div>
</div>
<div class="row mb-4">
	<div class="col-md-12 mb-3">
		<span class="h4">Leyenda</span>
	</div>
	
	<div class="col-md-12">
		<?php foreach ($status as $s): ?>
		<?php if ($s->id == 4): ?>
		<span class="mr-4"><i class="fas fa-circle rounded-circle mr-1" style="color:white;border:2px solid #ccc"></i><?= $s->name ?></span>
		<?php else: ?>
		<span class="mr-4"><i class="fas fa-circle mr-1" style="color: <?= $s->color ?>"></i><?= $s->name ?></span>	
		<?php endif ?>
		<?php endforeach ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12 pl-4">
		<div class="row">
			<?php foreach ($model as $m): ?>
				
			<div class="col-md-1 text-center mb-2 text-dark pr-2 pl-2" style="clear: right">
				<?php if ($m->status_id == 4): ?>
				<a href="#"  id="<?= $m->id ?>"  class="text-dark show" style="text-decoration: none;">
					<div class="pb-1 pt-2" style="border: 1.5px solid #ccc">
						<p class="h4 font-weight-light mb-1"><?= "H$m->room_number" ?></p>
						<p class="h6 m-0 border-top"><?= $m->type->initials ?></p>
					</div>
				</a>
				<?php else: ?>
					<a href="#" id="<?= $m->id ?>"  class="text-white show" style="text-decoration: none;">
						<div class="pb-1 pt-2" style="background:<?= $m->status->color ?>">
							<p class="h4 font-weight-light mb-1"><?= "H$m->room_number" ?></p>
							<p class="h6 m-0 border-top"><?= $m->type->initials ?></p>
						</div>
					</a>
					<div class="bg-white pt-3 text-left pl-3 border <?= $m->id ?> myTooltip">
						<span class="h6"><span class="mr-4"  style="color: <?= $m->status->color ?>"><?= $m->status->name ?></span> </span>
						<p class="h6 font-weight-light">Habitación <?= $m->type->name ?></p>
					</div>
				<?php endif ?>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>
