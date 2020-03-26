<style>
	canvas{
		width: 100% !important
	}
</style>
<div class="row">
	<div class="col-md-12">
		<h2 class="h2 font-weight-bold text-primary">Martes 15 de Abril</h2>
		<hr>
	</div>
</div>
<div class="row mb-4">
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-3 pr-4 pb-3 text-success text-white">
			<div class="row">
				<div class="col-md-5">
					<span class="h6 font-weight-light	 text-dark">In House</span>
					<p class="display-4 font-weight-bold">15</p>
				</div>
				<div class="col-md-7 text-right">
					<i class="fas fa-concierge-bell display-1"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-3 pb-3 pr-4 text-primary text-white">
			<div class="row">
				<div class="col-md-5">
					<span class="h6 font-weight-light	 text-dark">Llegada</span>
					<p class="display-4 font-weight-bold">6</p>
				</div>
				<div class="col-md-7 text-right">
					<i class="fas fa-sign-in-alt display-1"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="border shadow border-pink pl-4 pt-3 pb-3 pr-4 text-danger text-white">
			<div class="row">
				<div class="col-md-5">
					<span class="h6 font-weight-light text-dark">Salida</span>
					<p class="display-4 font-weight-bold">4</p>
				</div>
				<div class="col-md-7 text-right">
					<i class="fas fa-sign-out-alt display-1"></i>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="row mt-4">
	<div class="col-md-8">
		<canvas id="canvas"></canvas>
	</div>
	<div class="col-md-4 pt-5">
		<canvas id="chart-area"></canvas>
	</div>
	
</div>

<div class="row mt-4">
	
</div>

<script>

	//'#1eb2a6', '#dc3545', '#28a745', '#f67575', '#1eb2a6', '#dc3545', '#28a745', '#f67575', '#1eb2a6', '#dc3545', '#28a745', '#f67575'
	var DAYS = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'];
		var color = 'red';
		var barChartData = {
			labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
			datasets: [{
				label: 'Resumen de ocupación',
				backgroundColor: ['transparent'],
				borderColor: '#1eb2a6',
				borderWidth: 4,
				data: [
					20,
					20,
					19,
					22,
					21,
					20,
					22,
					20,
					22,
					22,
					20,
					19,
					22,
					26,
					22,
					22,
					20,
					19,
					22,
					26,
					20,
					20,
					19,
					22,
					26,
					20,
					22,
					20,
					20,
					19,
					22,
					15,
					20,
					22,
				]
			}, ]

		};
		
		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						10,4,5,1
					],
					backgroundColor: ['#1eb2a6', '#dc3545', '#28a745'],
					label: 'Dataset 1'
				}],
				labels: [
					'Ocupadas',
					'Disponibles',
					'Reservadas',
					'Bloqueadas',
				]
			},
			options: {
				elements: {
				      center: {
				    },
				  },
				responsive: true,
				legend: false,
				title: {
					display: true,
					text: ''
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);

			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'line',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: ''
					}
				}
			});

			var chart = new Chart(document.getElementById('line').getContext('2d'), {
			    // The type of chart we want to create
			    type: 'line',
			    data: {
			        labels: ['NO MIEMBROS','MIEMBROS'],
			        datasets: [{
			            label: '',
			            backgroundColor: ['transparent'],
			            borderColor: '#fff',
			            data: [1,2]
			        }]
			    },

			    // Configuration options go here
			    options: {
			    responsive: true,
			    tooltips: {
			      callbacks: {
			        label: function(tooltipItem, data) {
			          return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
			        }
			      }
			    }
			  }
			});
		};

	</script>