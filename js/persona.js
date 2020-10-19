$.post(baseurl+"ciudadc/getCiudades", //Llama la ur
    {
        sitReg: 1                     //Paramétros
    },
    function (data){
        var ciudad = JSON.parse(data);
        $.each(ciudad,function(i,item){            
            $('#cmbCiudades').append('<option value="'+item.id+'">'+item.nombre+'</option>')
        });        
});

$('#cmbCiudades').change(function(){
    $('#cmbCiudades option:selected').each(function(){
        var id = $('#cmbCiudades').val();
        // '<input name="id" type="number" value="+'+id+'>'
        // alert(id);
    });
});


//Cuando carga la página obtiene todos los datos
    // $.post(baseurl+"personac/getAll",
    //     function(data){
    //         var personas = JSON.parse(data);
    //         $.each(personas, function(i,item) {
    //             $('#tblPersonas').append(                    
    //                 '<tr>'+
    //                 '<td>'+item.id+'</td>'+
    //                 '<td>'+item.nombre+'</td>'+
    //                 '<td>'+item.apellido+'</td>'+
    //                 '<td>'+item.ciudad+'</td>'+
    //                 '<td>'+item.dni+'</td>'+     

    //             '</tr>'
    //             );
    //         })
    //     });


 $('#btnGetAll').click(function(){
    $('#tblPersonas').html(
         '<tr >'+
         '<th style="width: 10px">#</th>'+
        '<th>Nombre</th>'+
         '<th>Apellido</th>'+
         '<th>Ciudad</th>'+
         '<th>DNI</th>'+    
         '<th>Editar</th>'+                  
         '</tr>'
     );
$.post(baseurl+"personac/getAll",
function(data){
    var personas = JSON.parse(data);
    $.each(personas, function(i,item) {
        var number = i+1;
        $('#tblPersonas').append(
            
            '<tr class="filaPersona">'+
            '<td><div class="persona" id="'+item.id+'"></div>'+number+'</td>'+
             '<td>'+item.nombre+'</td>'+
            '<td>'+item.apellido+'</td>'+
            '<td>'+item.ciudad+'</td>'+
            '<td>'+item.dni+'</td>'+   
            '<td> <button id="btnDelete" onClick="deletePersona()"  class="btn btn-sm btn-danger btn-block"><i class="fas fa-trash-alt"></i></button> <br>'+
            '<a href="#" class="btn btn-block btn-primary btn-sm"  data-toggle="modal" data-target="#modal-overlay" onClick="selPersona(\''+item.id+'\',\''+item.nombre+'\',\''+item.apellido+'\',\''+item.email+'\');"><i class="fa fa-fw fa-edit"></i></a></td>' +
            +
            
        '</tr>'
        );
    });
});
 } );

 deletePersona = function(){
    var i = 0;
              $('#tblPersonas .filaPersona').each(function(){
             var idPer = $('.persona:eq('+i+')').attr('id');
             $.post(baseurl+"personac/deletePersona",
             {idPer: idPer},
                 function(data){

                 });  
                 i++;        
  });
 };

 selPersona = function(personaId, nombre, apellido, email){
    $('#nombre').val(nombre);
    $('#apellido').val(apellido);
    $('#email').val(email);
    $('#personaId').val(personaId);

 }


