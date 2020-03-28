<?php 
	use dosamigos\chartjs\ChartJs;
 ?>

<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary"><?= $fecha ?> <a href="" class="btn float-right btn-pink btn-sm mt-2">Nueva Reserva</a></h2>
		<hr>
	</div>
</div>
<div class="row mb-5">
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-2 pr-4 pb-2 text-success text-white">
			<div class="row">
				<div class="col-md-6">
					<span class="h6 font-weight-light text-dark">In House</span>
					<p class="h1 font-weight-bold">15</p>
				</div>
				<div class="col-md-6 text-right pt-3">
					<i class="fas fa-concierge-bell h1"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-2 pr-4 pb-2 text-primary text-white">
			<div class="row">
				<div class="col-md-6">
					<span class="h6 font-weight-light text-dark">Llegadas</span>
					<p class="h1 font-weight-bold">6</p>
				</div>
				<div class="col-md-6 text-right pt-3">
					<i class="fas fa-sign-in-alt h1"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-2 pr-4 pb-2 text-danger text-white">
			<div class="row">
				<div class="col-md-6">
					<span class="h6 font-weight-light text-dark">Salidas</span>
					<p class="h1 font-weight-bold">4</p>
				</div>
				<div class="col-md-6 text-right pt-3">
					<i class="fas fa-sign-out-alt h1"></i>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="row mt-5">
	<div class="col-md-6">
		<p class="h4 font-weight-light mb-4 mt-2"><i class="fas fa-chart-line text-pink"></i> Gráficos de Ocupación</p>
		<?= ChartJs::widget([
		    'type' => 'line',
		    'options' => [
		        'height' => 200,
		        'width' => 400
		    ],
		    'data' => [
		        'labels' => ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
		        'datasets' => [
		            [
		                'data' => [20,20,19,22,21,20,22,20,22,22,20,19,22,26,22,22,20,19,22,26,20,20,19,22,26,20,22,20,20,19,22,15,20,22,], // Your dataset
		                'label' => 'Ocupación',
		                'position' => 'bottom',
		                'backgroundColor' => 'transparent',
		                'borderColor' =>  '#1eb2a6',
		                'borderWidth' => 3,
		                'hoverBorderColor'=>'#1eb2a6',  
		            ],
		            
		        ]
		    ],'clientOptions' => [
		        'legend' => [
		            'display' => false,
		        ],

		    ],
		]);
		?>
	</div>
	<div class="col-md-6 pt-5">
		<?= ChartJs::widget([
		    'type' => 'doughnut',
		    'id' => 'structure',
		    'options' => [
		        'height' => 200,
		        'width' => 400
		    ],
		    'data' => [
		        'labels' => ['Disponibles','Reservadas','Bloqueadas'],
		        'datasets' => [
		            [
		                'data' => ['35.6', '17.5', '5'], // Your dataset
		                'label' => 'ocupación',
		                'position' => 'top',
		                'backgroundColor' => ['#20c997','#1eb2a6','#dc3545'],
		                'borderColor' =>  '#fafafa',
		                'borderWidth' => false,
		                'hoverBorderColor'=>["#999","#999","#999"],  
		            ],
		            
		        ]
		    ],
		    'clientOptions' => [
		        'legend' => [
		            'display' => true,
		            'position' => 'bottom',
		            'labels' => [
		                'fontSize' => 12,
		                'fontColor' => "#425062",
		            ]
		        ],
		        'tooltips' => [
		            'enabled' => true,
		            'intersect' => true
		        ],
		        'hover' => [
		            'mode' => true,
		        ],
		        // 'maintainAspectRatio' => false,

		    ],
		]);
		?>
	</div>

	
</div>

<div class="row mt-4">
	
</div>

