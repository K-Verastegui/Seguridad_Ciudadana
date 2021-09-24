function configurarTabla () {
	$("#tblbitacora").DataTable({
        language: {url:'/js/Spanish.json'},
        'proccessing':true,
        'serverSide':true,
        'ajax':'/admin/bitacora/bitacora',
        'columns':[
            {'data':'created_at'},
            {'data':'equipo'},
            {'data':'user'},
            {'data':null,
                render: function ( data ) {
                    return data.descripcion;
                }
            },
            {'data':'tabla'}
        ]      
	});
}