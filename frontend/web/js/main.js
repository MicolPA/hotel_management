
$(".select2").select2();

function addReserva(n){

	console.log(n);
	id = '['+n+']';
	main_div = document.createElement('div');
	$(main_div).attr('class', 'col-md-12 mb-1');

	row = document.createElement('div');
	$(row).attr('class', 'row');

	div_entrada = document.createElement('div');
	$(div_entrada).attr('class', 'col-md-2');

	label_entrada = document.createElement('label');
	$(label_entrada).html('Entrada');

	input_entrada = document.createElement('input');
	input_name = "fromdate"+id;
	$(input_entrada).attr({
	    'class':"form-control", 
	    'type':"date",
	    'name':input_name, 
	});


	div_salida = document.createElement('div');
	$(div_salida).attr('class', 'col-md-2');

	label_salida = document.createElement('label');
	$(label_salida).html('Salida');

	input_salida = document.createElement('input');
	input_name = "enddate"+id;
	$(input_salida).attr({
	    'class':"form-control", 
	    'type':"date",
	    'name':input_name, 
	});

	div_cant = document.createElement('div');
	$(div_cant).attr('class', 'col-md-1');

	label_cant = document.createElement('label');
	$(label_cant).html('cant');

	input_cant = document.createElement('input');
	input_name = "cantidad"+id;
	$(input_cant).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});


	div_hab = document.createElement('div');
	$(div_hab).attr('class', 'col-md-1');

	label_hab = document.createElement('label');
	$(label_hab).html('Hab.');

	select_hab = document.createElement('select');
	input_name = "room"+id;
	$(select_hab).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});
	$(select_hab).append("<option value=''>Seleccionar...</option>");

	div_a = document.createElement('div');
	$(div_a).attr('class', 'col-md-1');

	label_a = document.createElement('label');
	$(label_a).html('A');

	input_a = document.createElement('input');
	input_name = "adults"+id;
	$(input_a).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});


	div_n = document.createElement('div');
	$(div_n).attr('class', 'col-md-1');

	label_n = document.createElement('label');
	$(label_n).html('N');

	input_n = document.createElement('input');
	input_name = "kid"+id;
	$(input_n).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});

	div_b = document.createElement('div');
	$(div_b).attr('class', 'col-md-1');

	label_b = document.createElement('label');
	$(label_b).html('B');

	input_b = document.createElement('input');
	input_name = "babes"+id;
	$(input_b).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});


	div_p = document.createElement('div');
	$(div_p).attr('class', 'col-md-1');

	label_p = document.createElement('label');
	$(label_p).html('P/P/N');

	input_p = document.createElement('input');
	input_name = "ppn"+id;
	$(input_p).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});

	div_total = document.createElement('div');
	$(div_total).attr('class', 'col-md-2');

	label_total = document.createElement('label');
	$(label_total).html('Total');

	input_total = document.createElement('input');
	input_name = "total"+id;
	$(input_total).attr({
	    'class':"form-control", 
	    'type':"number",
	    'name':input_name, 
	});



	$("#row").append(main_div);
	$(main_div).append(row);

	$(row).append(div_entrada);
	// $(div_entrada).append(label_entrada);
	$(div_entrada).append(input_entrada);

	$(row).append(div_salida);
	// $(div_salida).append(label_salida);
	$(div_salida).append(input_salida);

	$(row).append(div_cant);
	// $(div_cant).append(label_cant);
	$(div_cant).append(input_cant);

	$(row).append(div_hab);
	// $(div_hab).append(label_hab);
	$(div_hab).append(select_hab);

	$(row).append(div_a);
	// $(div_a).append(label_a);
	$(div_a).append(input_a);

	$(row).append(div_n);
	// $(div_n).append(label_n);
	$(div_n).append(input_n);

	$(row).append(div_b);
	// $(div_b).append(label_b);
	$(div_b).append(input_b);

	$(row).append(div_p);
	// $(div_p).append(label_p);
	$(div_p).append(input_p);

	$(row).append(div_total);
	// $(div_total).append(label_total);
	$(div_total).append(input_total);

}