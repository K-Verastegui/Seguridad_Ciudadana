
$(document).ready(function () {

	id_institucion = $("#selIntitucion").val();

	if(id_institucion>0)
	{
		$("#tblamenazas").DataTable({
			language: {url:'/js/Spanish.json'},
			'proccessing':true,
			'serverSide':true,
			'destroy': true,
			'ajax':'/admin/foda/amenaza/'+id_institucion,
			'columns':[
				{'data':'id_ame'},
				{'data':'amenaza'},
				{'defaultContent':""}
				]
		});
	
		$("#tblfortalezas").DataTable({
			language: {url:'/js/Spanish.json'},
			'proccessing':true,
			'serverSide':true,
			'destroy': true,
			'ajax':'/admin/foda/fortaleza/'+id_institucion,
			'columns':[
				{'data':'id_for'},
				{'data':'fortaleza'},
				{'defaultContent':""}
				]
		});
		$("#tbldebilidades").DataTable({
			language: {url:'/js/Spanish.json'},
			'proccessing':true,
			'serverSide':true,
			'destroy': true,
			'ajax':'/admin/foda/debilidad/'+id_institucion,
			'columns':[
				{'data':'id_debi'},
				{'data':'debilidad'},
				{'defaultContent':"<button type='"}
				]
		});
	
		$("#tbloportunidades").DataTable({
			language: {url:'/js/Spanish.json'},
			'proccessing':true,
			'serverSide':true,
			'destroy': true,
			'ajax':'/admin/foda/oportunidad/'+id_institucion,
			'columns':[
				{'data':'id_opor'},
				{'data':'oportunidad'},
				{'defaultContent':""}
				]
		});
	}
});



