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
    $.post(baseurl+"personac/getAll",
        function(data){
            var personas = JSON.parse(data);
            $.each(personas, function(i,item) {
                $('#tblPersonas').append(                    
                    '<tr>'+
                    '<td>'+item.id+'</td>'+
                    '<td>'+item.nombre+'</td>'+
                    '<td>'+item.apellido+'</td>'+
                    '<td>'+item.ciudad+'</td>'+
                    '<td>'+item.dni+'</td>'+     

                '</tr>'
                );
            })
        });
// } );

 $('#btnGetAll').click(function(){
    $('#tblPersonas').html(
         '<tr>'+
         '<th style="width: 10px">#</th>'+
        '<th>Nombre</th>'+
         '<th>Apellido</th>'+
         '<th>Ciudad</th>'+
         '<th>DNI</th>'+    
         '<td>DNI</td>'+                  
         '</tr>'
     );
$.post(baseurl+"personac/getAll",
function(data){
    var personas = JSON.parse(data);
    $.each(personas, function(i,item) {
        $('#tblPersonas').append(
            
            '<tr>'+
            '<td>'+item.id+'</td>'+
             '<td>'+item.nombre+'</td>'+
            '<td>'+item.apellido+'</td>'+
            '<td>'+item.ciudad+'</td>'+
            '<td>'+item.dni+'</td>'+   
            '<td>'+item.dni+'</td>'+  
        '</tr>'
        );
    })
});
 } );
