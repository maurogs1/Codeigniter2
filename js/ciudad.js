$.post("../../ciudadc/getCiudades", //Llama la ur
    {
        sitReg: 1                     //Paramétros
    },
    function (data){
        var obj = JSON.parse(data);
        var output = '';
        var style = 'width: 10vh; height: 100px; -moz-border-radius: 50%;-webkit-border-radius: 50%; border-radius: 50%; background: #5cb85c; margin:auto;'
        //Por cada dato que tinee obj,
        $.each(obj, function(i,item){

            output +='  <li>'+
            '<div class="clsCiudad" style="'+style+'"></div>'+
            '<input type"text" style="width: 90%;" value="'+item.nombre+'" class="clsNombreCiudad text-center mt-2" <br>'+
            '<a class="users-list-name" href="#">'+item.nombre+'</a>'+
            '<span class="users-list-date ciudadId" id="'+item.id+'">'+item.id+'</span>'+
          '</li>  ';

        });
        $('#listCiudades').html(output);
        $('#listCiudades .clsCiudad').click(function(){
            var i = $('.clsCiudad').index(this);
            alert(i);
        });
});

$('#btnUpdateCiudades').click(function(){
    var i = 0;
    $('#listCiudades .clsCiudad').each(function(){
        var nombre = $('.clsNombreCiudad:eq('+i+')').val();
        var id = $('.ciudadId:eq('+i+')').attr('id');        
        $.post("../ci2/ciudadc/updateCiudad",
        {
            nombre: nombre,
            id: id
        },function(){

        });
        i++;

    });
});