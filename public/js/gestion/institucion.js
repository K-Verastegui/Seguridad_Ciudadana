
$(document).ready(function () {
    $('#selIntitucion').change(function () {
        mostrarMatriz();
	});

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
				{'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
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
				{'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
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
				{'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
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
				{'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
				]
		});
	}

	limpiarForm('frmAmenaza');
	limpiarForm('frmFortaleza');
	limpiarForm('frmDebilidad');
	limpiarForm('frmOportunidad');
	/*$('#btnAmenaza').click(function () {
        saveAmenaza();
	});
	
	$('#btnFortaleza').click(function () {
        saveFortaleza();
	});
	
	$('#btnDebilidad').click(function () {
        saveDebilidad();
	});
	
	$('#btnOportunidad').click(function () {
        saveOportunidad();
    });*/
});


function mostrarMatriz()
{
	seleccion = $("#selIntitucion").val();
	$("#tblamenazas").DataTable({
		language: {url:'/js/Spanish.json'},
		'proccessing':true,
		'serverSide':true,
		'destroy': true,
		'ajax':'/admin/foda/amenaza/'+seleccion,
        'columns':[
            {'data':'id_ame'},
            {'data':'amenaza'},
            {'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
            ]
	});

	$("#tblfortalezas").DataTable({
		language: {url:'/js/Spanish.json'},
		'proccessing':true,
		'serverSide':true,
		'destroy': true,
		'ajax':'/admin/foda/fortaleza/'+seleccion,
        'columns':[
            {'data':'id_for'},
            {'data':'fortaleza'},
            {'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
            ]
	});
	$("#tbldebilidades").DataTable({
		language: {url:'/js/Spanish.json'},
		'proccessing':true,
		'serverSide':true,
		'destroy': true,
		'ajax':'/admin/foda/debilidad/'+seleccion,
        'columns':[
            {'data':'id_debi'},
            {'data':'debilidad'},
            {'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
            ]
	});

	$("#tbloportunidades").DataTable({
		language: {url:'/js/Spanish.json'},
		'proccessing':true,
		'serverSide':true,
		'destroy': true,
		'ajax':'/admin/foda/oportunidad/'+seleccion,
        'columns':[
            {'data':'id_opor'},
            {'data':'oportunidad'},
            {'defaultContent':"<button type='button' id='editar' class='btn btn-primary btn-xs'><i class='fa fa-edit'></i></button> <button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button>"}
            ]
	});

	limpiarForm('frmAmenaza');
	limpiarForm('frmFortaleza');
	limpiarForm('frmDebilidad');
	limpiarForm('frmOportunidad');
}

function successMensaje(mensaje,destino){
    toastr.success(mensaje,destino,{
        "progressBar":true,
        "positionClass" : "toast-bottom-right"
    });
}

function errorMensaje(mensaje,destino){
    toastr.error(mensaje,destino,{
        "progressBar":true,
        "positionClass" : "toast-bottom-right"
    });
}
function warningMensaje(mensaje,destino){
    toastr.warning(mensaje,destino,{
        "progressBar":true,
        "positionClass" : "toast-bottom-right"
    });
}
function limpiarForm(id)
{
    document.getElementById(id).reset();
}

function mensajePersonalizado(titulo,texto,tipo,tiempo){
    new PNotify({
        title: titulo,
        text: texto,
        type: tipo,
        delay: tiempo
    });
}

function viewAmenaza(){
	$("#tblamenazas").on('click','#editar',function(){
		var data = $("#tblamenazas").dataTable().fnGetData($(this).closest('tr'));
		$('#editarAmenaza').modal('show');
		$('#editaramenaza').val(data.amenaza);
		$('#id_amen').val(data.id_ame);
	});
}


function viewDebilidad(){
	$("#tbldebilidades").on('click','#editar',function(){
		var data = $("#tbldebilidades").dataTable().fnGetData($(this).closest('tr'));
		$('#editarDebilidad').modal('show');
		$('#editardebilidad').val(data.debilidad);
		$('#id_debi').val(data.id_debi);
	});
}

function viewOportunidad(){
	$("#tbloportunidades").on('click','#editar',function(){
		var data = $("#tbloportunidades").dataTable().fnGetData($(this).closest('tr'));
		$('#editarOportunidad').modal('show');
		$('#editaroportunidad').val(data.oportunidad);
		$('#id_opor').val(data.id_opor);
	});
}

function viewFortaleza(){
	$("#tblfortalezas").on('click','#editar',function(){
		var data = $("#tblfortalezas").dataTable().fnGetData($(this).closest('tr'));
		$.get('/admin/foda/sesion',{id_for:data.id_for},function(rpta){
			if(rpta.Sesion == "Asignado"){
				$('#editarFortaleza').modal('show');
				$('#editarfortaleza').val(data.fortaleza);
				$('#id_fort').val(data.id_for);
			}else {
				mensajePersonalizado("Fortaleza","Ocurrio un error","error",3000);
			}
		});
	});
}

function eliminar(){
	$("#tblamenazas").on('click','#eliminar',function(){
        var data = $("#tblamenazas").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja esta amenaza?',
		    icon: 'glyphicon glyphicon-question-sign',
            //hide: false,
            delay:5000,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.get('/admin/foda/eliminar',{cabecera:"amenaza",id:data.id_ame},function(rpta){
				if (rpta.Estado == "Eliminado")
				{
					$("#tblamenazas").DataTable().draw().clear();
					mensajePersonalizado("Amenaza","Eliminada Correctamente","success",3000);
				}else
				{
					mensajePersonalizado("Amenaza","No puedes dar de baja esta amenaza","error",3000);
				}
			});
    	});
	});

	$("#tblfortalezas").on('click','#eliminar',function(){
        var data = $("#tblfortalezas").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja esta fortaleza?',
		    icon: 'glyphicon glyphicon-question-sign',
            //hide: false,
            delay:5000,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.get('/admin/foda/eliminar',{cabecera:"fortaleza",id:data.id_for},function(rpta){
				if (rpta.Estado == "Eliminado")
				{
					$("#tblfortalezas").DataTable().draw().clear();
					mensajePersonalizado("Fortaleza","Eliminada Correctamente","success",3000);
				}else
				{
					mensajePersonalizado("Fortaleza","No puedes dar de baja esta fortaleza","error",3000);
				}
			});
    	});
	});

	$("#tbldebilidades").on('click','#eliminar',function(){
        var data = $("#tbldebilidades").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja esta debilidad?',
		    icon: 'glyphicon glyphicon-question-sign',
            //hide: false,
            delay:5000,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.get('/admin/foda/eliminar',{cabecera:"debilidad",id:data.id_debi},function(rpta){
				if (rpta.Estado == "Eliminado")
				{
					$("#tbldebilidades").DataTable().draw().clear();
					mensajePersonalizado("Debilidad","Eliminada Correctamente","success",3000);
				}else
				{
					mensajePersonalizado("Debilidad","No puedes dar de baja esta debilidad","error",3000);
				}
			});
    	});
	});

	$("#tbloportunidades").on('click','#eliminar',function(){
        var data = $("#tbloportunidades").dataTable().fnGetData($(this).closest('tr'));
		(new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Estas seguro que desea dar de baja esta Oportunidad?',
		    icon: 'glyphicon glyphicon-question-sign',
            //hide: false,
            delay:5000,
		    confirm: {
		        confirm: true
		    },
		    buttons: {
		        closer: false,
		        sticker: false
		    },
		    history: {
		        history: false
		    }
		    })).get().on('pnotify.confirm', function(){
		    $.get('/admin/foda/eliminar',{cabecera:"oportunidad",id:data.id_opor},function(rpta){
				if (rpta.Estado == "Eliminado")
				{
					$("#tbloportunidades").DataTable().draw().clear();
					mensajePersonalizado("Oportunidad","Eliminada Correctamente","success",3000);
				}else
				{
					mensajePersonalizado("Oportunidad","No puedes dar de baja esta oportunidad","error",3000);
				}
			});
    	});
	});
}



