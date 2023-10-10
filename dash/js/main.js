$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        "ajax":{            
            "url": "bd/crud.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "usuario"},
            {"data": "matricula"},
            {"data": "fn"},
            {"data": "correo"},
            {"data": "contraseña"},
            {"data": "id_cargo"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        usuario = $.trim($('#usuario').val());    
        matricula = $.trim($('#matricula').val());
        fn = $.trim($('#fn').val());    
        correo = $.trim($('#correo').val());    
        contraseña = $.trim($('#contraseña').val());
        id_cargo = $.trim($('#id_cargo').val());                            
            $.ajax({
              url: "bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {id:id, usuario:usuario, matricula:matricula, fn:fn, correo:correo, contraseña:contraseña ,id_cargo:id_cargo ,opcion:opcion},    
              success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        user_id=null;
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Alta de Usuario");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        usuario = fila.find('td:eq(1)').text();
        matricula = fila.find('td:eq(2)').text();
        fn = fila.find('td:eq(3)').text();
        correo = fila.find('td:eq(4)').text();
        password = fila.find('td:eq(5)').text();
        id_cargo = fila.find('td:eq(6)').text();
        $("#usuario").val(usuario);
        $("#matricula").val(matricula);
        $("#fn").val(fn);
        $("#correo").val(correo);
        $("#contraseña").val(contraseña);
        $("#id_cargo").val(id_cargo);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });   