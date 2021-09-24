var idvfof = [];
var idvfoo = [];
var idvfaf = [];
var idvfaa = [];

var idvdod = [];
var idvdoo = [];
var idvdad = [];
var idvdaa = [];

$(document).ready(function () {
	$('#btnFO').click(function () {
        efo();
	});
	
	$('#btnFA').click(function () {
        efa();
	});
	
	$('#btnDO').click(function () {
        edo();
	});
	
	$('#btnDA').click(function () {
        eda();
    });

    $('#selIntitucion').change(function () {
        mostrar();
	});
});

function mostrar()
{
    divfort = document.getElementById("divfort");
    divopor = document.getElementById("divopor");

    divamen = document.getElementById("divamen");
    divdebi = document.getElementById("divdebi");

    rfo = document.getElementById("rfo");
    rfa = document.getElementById("rfa");
    rdo = document.getElementById("rdo");
    rda = document.getElementById("rda");

    divfort.style.display = "none";
    divdebi.style.display = "none";

    divamen.style.display = "none";
    divopor.style.display = "none";

    rfo.style.display = "none";
    rfa.style.display = "none";
    rdo.style.display = "none";
    rda.style.display = "none";

    document.getElementById('titleizq').innerHTML="";
    document.getElementById('titleder').innerHTML="";
    document.getElementById('titlecen').innerHTML=""; 
}

function efo()
{
    seleccion = $("#selIntitucion").val();

    divfort = document.getElementById("divfort");
    divopor = document.getElementById("divopor");

    divamen = document.getElementById("divamen");
    divdebi = document.getElementById("divdebi");

    rfo = document.getElementById("rfo");
    rfa = document.getElementById("rfa");
    rdo = document.getElementById("rdo");
    rda = document.getElementById("rda");

    if(seleccion=='0')
    {
        mensajePersonalizado("Estrategias","Seleccionar Institucion","error",3000);
    }
    else{
        divfort.style.display = "block";
        divdebi.style.display = "none";

        divamen.style.display = "none";
        divopor.style.display = "block";

        rfo.style.display = "block";
        rfa.style.display = "none";
        rdo.style.display = "none";
        rda.style.display = "none";

        document.getElementById('titleizq').innerHTML="FORTALEZAS";
        document.getElementById('titleder').innerHTML="OPORTUNIDADES";
        document.getElementById('titlecen').innerHTML="ESTRATEGIAS FO";

        $("#tblfortalezas").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/fortaleza/'+seleccion,
            'columns':[
                {'data':'id_for'},
                {'data':'fortaleza'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='selfof-"+data.id_for+"' onclick='return clickactionfof(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }
            ]
        });
        
        $("#tbloportunidades").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/oportunidad/'+seleccion,
            'columns':[
                {'data':'id_opor'},
                {'data':'oportunidad'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='selfoo-"+data.id_opor+"' onclick='return clickactionfoo(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });

        $("#tblfo").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/fo/'+seleccion,
            'columns':[
                {'data':'id_fo'},
                {'data':'estrategiafo'},
                {'defaultContent':"<button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button> <button type='button' id='ver' class='btn btn-info btn-xs'><i class='fa fa-eye'></i></button>",'className': 'text-center'}                
            ]
        });
    }
}

function efa()
{
    seleccion = $("#selIntitucion").val();

    divfort = document.getElementById("divfort");
    divopor = document.getElementById("divopor");

    divamen = document.getElementById("divamen");
    divdebi = document.getElementById("divdebi");

    rfo = document.getElementById("rfo");
    rfa = document.getElementById("rfa");
    rdo = document.getElementById("rdo");
    rda = document.getElementById("rda");

    if(seleccion=='0')
    {
        mensajePersonalizado("Estrategias","Seleccionar Institucion","error",3000);
    }
    else
    {
        divfort.style.display = "block";
        divdebi.style.display = "none";

        divamen.style.display = "block";
        divopor.style.display = "none";

        rfo.style.display = "none";
        rfa.style.display = "block";
        rdo.style.display = "none";
        rda.style.display = "none";

        document.getElementById('titleizq').innerHTML="FORTALEZAS";
        document.getElementById('titleder').innerHTML="AMENAZAS";
        document.getElementById('titlecen').innerHTML="ESTRATEGIAS FA";

        $("#tblfortalezas").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/fortaleza/'+seleccion,
            'columns':[
                {'data':'id_for'},
                {'data':'fortaleza'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='selfaf-"+data.id_for+"' onclick='return clickactionfaf(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });

        $("#tblamenazas").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/amenaza/'+seleccion,
            'columns':[ 
                {'data':'id_ame'},
                {'data':'amenaza'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='selfaa-"+data.id_ame+"' onclick='return clickactionfaa(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });

        $("#tblfa").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/fa/'+seleccion,
            'columns':[
                {'data':'id_fa'},
                {'data':'estrategiafa'},
                {'defaultContent':"<button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button> <button type='button' id='ver' class='btn btn-info btn-xs'><i class='fa fa-eye'></i></button>",'className': 'text-center'}                
            ]
        });
    }
}

function eda()
{
    seleccion = $("#selIntitucion").val();

    divfort = document.getElementById("divfort");
    divopor = document.getElementById("divopor");

    divamen = document.getElementById("divamen");
    divdebi = document.getElementById("divdebi");

    rfo = document.getElementById("rfo");
    rfa = document.getElementById("rfa");
    rdo = document.getElementById("rdo");
    rda = document.getElementById("rda");

    if(seleccion=='0')
    {
        mensajePersonalizado("Estrategias","Seleccionar Institucion","error",3000);
    }
    else
    {
        divfort.style.display = "none";
        divdebi.style.display = "block";

        divamen.style.display = "block";
        divopor.style.display = "none";

        rfo.style.display = "none";
        rfa.style.display = "none";
        rdo.style.display = "none";
        rda.style.display = "block";

        document.getElementById('titleizq').innerHTML="DEBILIDADES";
        document.getElementById('titleder').innerHTML="AMENAZAS";
        document.getElementById('titlecen').innerHTML="ESTRATEGIAS DA";

        $("#tbldebilidades").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/debilidad/'+seleccion,
            'columns':[
                {'data':'id_debi'},
                {'data':'debilidad'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='seldad-"+data.id_debi+"' onclick='return clickactiondad(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });
        
        $("#tblamenazas").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/amenaza/'+seleccion,
            'columns':[
                {'data':'id_ame'},
                {'data':'amenaza'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='seldaa-"+data.id_ame+"' onclick='return clickactiondaa(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });

        $("#tblda").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/da/'+seleccion,
            'columns':[
                {'data':'id_da'},
                {'data':'estrategiada'},
                {'defaultContent':"<button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button> <button type='button' id='ver' class='btn btn-info btn-xs'><i class='fa fa-eye'></i></button>",'className': 'text-center'}                
            ]
        });
    }
}

function edo()
{
    seleccion = $("#selIntitucion").val();

    divfort = document.getElementById("divfort");
    divopor = document.getElementById("divopor");

    divamen = document.getElementById("divamen");
    divdebi = document.getElementById("divdebi");

    rfo = document.getElementById("rfo");
    rfa = document.getElementById("rfa");
    rdo = document.getElementById("rdo");
    rda = document.getElementById("rda");

    if(seleccion=='0')
    {
        mensajePersonalizado("Estrategias","Seleccionar Institucion","error",3000);
    }
    else{
        
        divfort.style.display = "none";
        divdebi.style.display = "block";

        divamen.style.display = "none";
        divopor.style.display = "block";

        rfo.style.display = "none";
        rfa.style.display = "none";
        rdo.style.display = "block";
        rda.style.display = "none";

        document.getElementById('titleizq').innerHTML="DEBILIDADES";
        document.getElementById('titleder').innerHTML="OPORTUNIDADES";
        document.getElementById('titlecen').innerHTML="ESTRATEGIAS DO";

        $("#tbldebilidades").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/debilidad/'+seleccion,
            'columns':[
                {'data':'id_debi'},
                {'data':'debilidad'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='seldod-"+data.id_debi+"' onclick='return clickactiondod(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });
        
        $("#tbloportunidades").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/foda/oportunidad/'+seleccion,
            'columns':[
                {'data':'id_opor'},
                {'data':'oportunidad'},
                {'data':null,
                    render: function ( data ) {
                        return "<button value='0' type='button' id='seldoo-"+data.id_opor+"' onclick='return clickactiondoo(this);' style='width:90%;' class='btn btn-success btn-xs'><i class='fa fa-check'></i>Seleccionar</button>";
                    },'className': 'text-center'
                }                
            ]
        });

        $("#tbldo").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/do/'+seleccion,
            'columns':[
                {'data':'id_do'},
                {'data':'estrategiado'},
                {'defaultContent':"<button type='button' id='eliminar' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i></button> <button type='button' id='ver' class='btn btn-info btn-xs'><i class='fa fa-eye'></i></button>",'className': 'text-center'}                
            ]
        });
    }
}

function mensajePersonalizado(titulo,texto,tipo,tiempo){
    new PNotify({
        title: titulo,
        text: texto,
        type: tipo,
        delay: tiempo
    });
}
/////////////////////////////////////////////////////////////////
function clickactionfof(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#selfof-"+cadena[1]).html(opcion);
        $("#selfof-"+cadena[1]).addClass('btn-danger');
        $("#selfof-"+cadena[1]).val("1");
        idvfof.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#selfof-"+cadena[1]).html(opcion1);
        $("#selfof-"+cadena[1]).removeClass('btn-danger');
        $("#selfof-"+cadena[1]).addClass('btn-success');
        $("#selfof-"+cadena[1]).val("0");

        for(var i=0;i<idvfof.length;i++)
        {
            if(idvfof[i]==cadena[1])
            {
                idvfof.splice(i,1);
            }
        }
    }
}

function clickactionfoo(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#selfoo-"+cadena[1]).html(opcion);
        $("#selfoo-"+cadena[1]).addClass('btn-danger');
        $("#selfoo-"+cadena[1]).val("1");
        idvfoo.push(cadena[1]);

    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#selfoo-"+cadena[1]).html(opcion1);
        $("#selfoo-"+cadena[1]).removeClass('btn-danger');
        $("#selfoo-"+cadena[1]).addClass('btn-success');
        $("#selfoo-"+cadena[1]).val("0");

        for(var i=0;i<idvfoo.length;i++)
        {
            if(idvfoo[i]==cadena[1])
            {
                idvfoo.splice(i,1);
            }
        }
    }
}

function clickactionfaf(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#selfaf-"+cadena[1]).html(opcion);
        $("#selfaf-"+cadena[1]).addClass('btn-danger');
        $("#selfaf-"+cadena[1]).val("1");
        idvfaf.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#selfaf-"+cadena[1]).html(opcion1);
        $("#selfaf-"+cadena[1]).removeClass('btn-danger');
        $("#selfaf-"+cadena[1]).addClass('btn-success');
        $("#selfaf-"+cadena[1]).val("0");
        
        for(var i=0;i<idvfaf.length;i++)
        {
            if(idvfaf[i]==cadena[1])
            {
                idvfaf.splice(i,1);
            }
        }
    }
}

function clickactionfaa(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#selfaa-"+cadena[1]).html(opcion);
        $("#selfaa-"+cadena[1]).addClass('btn-danger');
        $("#selfaa-"+cadena[1]).val("1");
        
        idvfaa.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#selfaa-"+cadena[1]).html(opcion1);
        $("#selfaa-"+cadena[1]).removeClass('btn-danger');
        $("#selfaa-"+cadena[1]).addClass('btn-success');
        $("#selfaa-"+cadena[1]).val("0");

        for(var i=0;i<idvfaa.length;i++)
        {
            if(idvfaa[i]==cadena[1])
            {
                idvfaa.splice(i,1);
            }
        }
    }
}
/////////////////////////////////////////////////////////////
function clickactiondod(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#seldod-"+cadena[1]).html(opcion);
        $("#seldod-"+cadena[1]).addClass('btn-danger');
        $("#seldod-"+cadena[1]).val("1");

        idvdod.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#seldod-"+cadena[1]).html(opcion1);
        $("#seldod-"+cadena[1]).removeClass('btn-danger');
        $("#seldod-"+cadena[1]).addClass('btn-success');
        $("#seldod-"+cadena[1]).val("0");
        
        for(var i=0;i<idvdod.length;i++)
        {
            if(idvdod[i]==cadena[1])
            {
                idvdod.splice(i,1);
            }
        }
    }
}

function clickactiondoo(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#seldoo-"+cadena[1]).html(opcion);
        $("#seldoo-"+cadena[1]).addClass('btn-danger');
        $("#seldoo-"+cadena[1]).val("1");
        
        idvdoo.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#seldoo-"+cadena[1]).html(opcion1);
        $("#seldoo-"+cadena[1]).removeClass('btn-danger');
        $("#seldoo-"+cadena[1]).addClass('btn-success');
        $("#seldoo-"+cadena[1]).val("0"); 
        
        for(var i=0;i<idvdoo.length;i++)
        {
            if(idvdoo[i]==cadena[1])
            {
                idvdoo.splice(i,1);
            }
        }
    }
}

function clickactiondad(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        opcion="<i class='fas fa-times'></i>Quitar";
        $("#seldad-"+cadena[1]).html(opcion);
        $("#seldad-"+cadena[1]).addClass('btn-danger');
        $("#seldad-"+cadena[1]).val("1");
        $("#daDebi").val(cadena[1]);

        idvdad.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#seldad-"+cadena[1]).html(opcion1);
        $("#seldad-"+cadena[1]).removeClass('btn-danger');
        $("#seldad-"+cadena[1]).addClass('btn-success');
        $("#seldad-"+cadena[1]).val("0"); 

        for(var i=0;i<idvdad.length;i++)
        {
            if(idvdad[i]==cadena[1])
            {
                idvdad.splice(i,1);
            }
        }
    }
}

function clickactiondaa(b)
{
    var cadena = b.id.split("-");
    if(b.value==0)
    {
        vdaa = [];

        table = $('#tblamenazas').DataTable();

        vdaa = table
        .column( 0 )
        .data()
        .toArray();

        opcion="<i class='fas fa-times'></i>Quitar";
        $("#seldaa-"+cadena[1]).html(opcion);
        $("#seldaa-"+cadena[1]).addClass('btn-danger');
        $("#seldaa-"+cadena[1]).val("1");
        
        idvdaa.push(cadena[1]);
    }
    else
    {
        opcion1="<i class='fa fa-check'></i>Seleccionar";
        $("#seldaa-"+cadena[1]).html(opcion1);
        $("#seldaa-"+cadena[1]).removeClass('btn-danger');
        $("#seldaa-"+cadena[1]).addClass('btn-success');
        $("#seldaa-"+cadena[1]).val("0");  

        for(var i=0;i<idvdaa.length;i++)
        {
            if(idvdaa[i]==cadena[1])
            {
                idvdaa.splice(i,1);
            }
        }
    }
}

function viewFo(){
	$("#tblfo").on('click','#ver',function(){
		var data = $("#tblfo").dataTable().fnGetData($(this).closest('tr'));
        $('#dialogo1').modal('show');
        document.getElementById('titlever').innerHTML=data.estrategiafo;
        document.getElementById('modal-title').innerHTML='ESTRATEGIA FO';
        //document.getElementById('titlever1').innerHTML='FORTALEZAS';
        //document.getElementById('titlever2').innerHTML='OPORTUNIDADES';
        document.getElementById('column').innerHTML='Fortaleza';
        document.getElementById('column1').innerHTML='Oportunidad';
        $("#tbl1").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/fof/'+data.id_fo,
            'columns':[
                {'data':'id_for'},
                {'data':'fortaleza'}              
            ]
        });

        $("#tbl2").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/foo/'+data.id_fo,
            'columns':[
                {'data':'id_opor'},
                {'data':'oportunidad'}              
            ]
        });
		//$('#editaramenaza').val(data.amenaza);
		//$('#id_amen').val(data.id_ame);
	});
}

function viewFa(){
	$("#tblfa").on('click','#ver',function(){
		var data = $("#tblfa").dataTable().fnGetData($(this).closest('tr'));
        $('#dialogo1').modal('show');
        document.getElementById('titlever').innerHTML=data.estrategiafa;
        document.getElementById('modal-title').innerHTML='ESTRATEGIA FA';
        //document.getElementById('titlever1').innerHTML='FORTALEZAS';
        //document.getElementById('titlever2').innerHTML='OPORTUNIDADES';
        document.getElementById('column').innerHTML='Fortaleza';
        document.getElementById('column1').innerHTML='Amenaza';
        $("#tbl1").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/faf/'+data.id_fa,
            'columns':[
                {'data':'id_for'},
                {'data':'fortaleza'}              
            ]
        });

        $("#tbl2").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/faa/'+data.id_fa,
            'columns':[
                {'data':'id_ame'},
                {'data':'amenaza'}              
            ]
        });
		//$('#editaramenaza').val(data.amenaza);
		//$('#id_amen').val(data.id_ame);
	});
}

function viewDo(){
	$("#tbldo").on('click','#ver',function(){
		var data = $("#tbldo").dataTable().fnGetData($(this).closest('tr'));
        $('#dialogo1').modal('show');
        document.getElementById('titlever').innerHTML=data.estrategiado;
        document.getElementById('modal-title').innerHTML='ESTRATEGIA DO';
        //document.getElementById('titlever1').innerHTML='FORTALEZAS';
        //document.getElementById('titlever2').innerHTML='OPORTUNIDADES';
        document.getElementById('column').innerHTML='Debilidad';
        document.getElementById('column1').innerHTML='Oportunidad';
        $("#tbl1").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/dod/'+data.id_do,
            'columns':[
                {'data':'id_debi'},
                {'data':'debilidad'}              
            ]
        });

        $("#tbl2").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/doo/'+data.id_do,
            'columns':[
                {'data':'id_opor'},
                {'data':'oportunidad'}              
            ]
        });
		//$('#editaramenaza').val(data.amenaza);
		//$('#id_amen').val(data.id_ame);
	});
}

function viewDa(){
	$("#tblda").on('click','#ver',function(){
		var data = $("#tblda").dataTable().fnGetData($(this).closest('tr'));
        $('#dialogo1').modal('show');
        document.getElementById('titlever').innerHTML=data.estrategiada;
        document.getElementById('modal-title').innerHTML='ESTRATEGIA DA';
        //document.getElementById('titlever1').innerHTML='FORTALEZAS';
        //document.getElementById('titlever2').innerHTML='OPORTUNIDADES';
        document.getElementById('column').innerHTML='Debilidad';
        document.getElementById('column1').innerHTML='Amenaza';
        $("#tbl1").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/dad/'+data.id_da,
            'columns':[
                {'data':'id_debi'},
                {'data':'debilidad'}              
            ]
        });

        $("#tbl2").DataTable({
            language: {url:'/js/Spanish.json'},
            'proccessing':true,
            'serverSide':true,
            'destroy': true,
            "bLengthChange" : false,
            "searching": false,
            "bInfo": false,
            'ajax':'/admin/estrategia/daa/'+data.id_da,
            'columns':[
                {'data':'id_ame'},
                {'data':'amenaza'}              
            ]
        });
		//$('#editaramenaza').val(data.amenaza);
		//$('#id_amen').val(data.id_ame);
	});
}

function deleteFo(){
	$("#tblfo").on('click','#eliminar',function(){
        var data = $("#tblfo").dataTable().fnGetData($(this).closest('tr'));
        (new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Esta seguro que desea dar de baja esta Estrategia?',
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
            $.get('admin/estrategia/deletefo',{id:data.id_fo},function(rpta){
            if (rpta.Estado == "Eliminada")
            {
                $("#tblfo").DataTable().draw().clear();
                mensajePersonalizado("FO","Eliminado Correctamente","success",3000);
            }else
            {
              console.log(rpta.Estado)
            }
            });
        });
	});
}

function deleteFa(){
	$("#tblfa").on('click','#eliminar',function(){
        var data = $("#tblfa").dataTable().fnGetData($(this).closest('tr'));
        (new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Esta seguro que desea dar de baja esta Estrategia?',
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
            $.get('admin/estrategia/deletefa',{id:data.id_fa},function(rpta){
            if (rpta.Estado == "Eliminada")
            {
                $("#tblfa").DataTable().draw().clear();
                mensajePersonalizado("FA","Eliminado Correctamente","success",3000);
            }else
            {
              console.log(rpta.Estado)
            }
            });
        });
	});
}

function deleteDo(){
	$("#tbldo").on('click','#eliminar',function(){
        var data = $("#tbldo").dataTable().fnGetData($(this).closest('tr'));
        (new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Esta seguro que desea dar de baja esta Estrategia?',
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
            $.get('admin/estrategia/deletedo',{id:data.id_do},function(rpta){
            if (rpta.Estado == "Eliminada")
            {
                $("#tbldo").DataTable().draw().clear();
                mensajePersonalizado("DO","Eliminado Correctamente","success",3000);
            }else
            {
              console.log(rpta.Estado)
            }
            });
        });
	});
}

function deleteDa(){
	$("#tblda").on('click','#eliminar',function(){
        var data = $("#tblda").dataTable().fnGetData($(this).closest('tr'));
        (new PNotify({
		    title: 'Confirmación Necesaria',
		    text: '¿Esta seguro que desea dar de baja esta Estrategia?',
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
            $.get('admin/estrategia/deleteda',{id:data.id_da},function(rpta){
            if (rpta.Estado == "Eliminada")
            {
                $("#tblda").DataTable().draw().clear();
                mensajePersonalizado("DA","Eliminado Correctamente","success",3000);
            }else
            {
              console.log(rpta.Estado)
            }
            });
        });
	});
}