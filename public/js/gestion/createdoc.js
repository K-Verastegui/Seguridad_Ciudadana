
var objetivos=[];
var objetivo=[];
var controlobjetivo=[];
var cont = 0;
var total = 0;
$(document).ready(function () {
    $('#btnadddet').click(function () {
        agregarDetalle();
    });
});
function mostrarMensajeError(mensaje) {
    $(".alert").css('display', 'block');
    $(".alert").removeClass("hidden");
    $(".alert").addClass("alert-danger");
    $(".alert").html("<button type='button' class='close' dataclose='alert'>×</button>" +
        "<span><b>Error!</b> " + mensaje + ".</span>");
    $('.alert').delay(5000).hide(400);
}
function agregarDetalle(){
    obj = $("#obj_est").val();
    //alert(obj_est);
    if(obj=='')
    {
        alert('Ingresar Objetivo Estratégico')
    }
    else
    {
        var i = 0;
        var band = false;
        while (i < cont) {
            if (controlobjetivo[i] == obj) {
                band = true;
            }
            i = i + 1;
        }
        if(band == true)
        {
            alert("No puede volver a añadir el mismo objetivo");
            return false;
        }
        else{
            controlobjetivo[cont] = obj;
            var aux= cont+1;
            var fila = '<tr class="selected" id="fila' + cont + '">'+
            '<td style="text-align:center;">'+aux+'</td>'+
            '<td><input cols="30" rows="2" class="form-control" style="width:100%;" type="text" name="ob_est[]" value="' + obj + '" readonly></td>'+
            '<td style="text-align:center;"><button type="button" class="btn btn-danger btn-xs" onclick="eliminardetalle('+cont+');"><i class="fa fa-times" ></i></button></td></tr>';
            $('#detalles').append(fila);
            objetivo.push(obj);
            objetivos.push({
                codigo:cont,
                objetivo:obj
            });
            cont++;
            $('#obj_est').val('');
        }
    }
	//return false;
}

function eliminardetalle(index) {
    //alert('jola');
    tam = objetivos.length;
    var i = 0;
    var pos;
    while (i < tam) {
        if (objetivos[i].codigo == index) {
            pos = i;
            break;
        }
        i = i + 1;
    }
    objetivos.splice(pos, 1);
    objetivo.splice(pos, 1);
    $('#fila' + index).remove();
    controlobjetivo[index] = "";
}