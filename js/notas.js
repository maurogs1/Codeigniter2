$.post(baseurl+"notasc/getNotas",
    function(data) {
        var obj = JSON.parse(data);
        var style = "background: transparent; border:0px;outline:none; text-align: center;width: 100%"
        $.each(obj, function(i, item){
            var number = i+1;
            $('#tblNotas').append(
                
                '<tr class="filaNotas">'+
                '<td><div class="alumno" id="'+item.id+'"></div>'+number+'</td>'+
                '<td>'+item.alumno+'</th>'+
                '<td><input style="'+style+'" type="number" maxlength="2" value="'+item.A+'" class="nota1"></th>'+
                '<td><input style="'+style+'" type="number" maxlength="2" value="'+item.B+'" class="nota2"></th>'+
                '<td><input style="'+style+'" type="number" maxlength="2" value="'+item.C+'" class="nota3"></th>'+
                '<td><input style="'+style  +'" type="number" maxlength="2" value="'+item.D+'" class="nota4"></th>'+
                '<td><input style="'+style+'" type="number" maxlength="2" value="'+item.notafinal+'"class="notafinal"></th>'+   
                '</tr>'
            );
        });
        $('input[type=number]').focusout(function(){
            if($(this).val()<0 || $(this).val()>99){
                alert("valor no valido");
                $(this).focus();
                $(this).select();
            }
        });
        $('#tblNotas .nota4').keyup(function(){
            var i = $('.nota4').index(this);
            var n1 = $('.nota1:eq('+i+')').val();
            var n2 = $('.nota2:eq('+i+')').val();
            var n3 = $('.nota3:eq('+i+')').val();
            var promedio = (parseFloat(n1)+parseFloat(n2)+parseFloat(n3)+parseFloat($(this).val()))/4;   
            $('.notafinal:eq('+i+')').val(promedio);
        });
});




    $('#btnNotas').click(function(){
        var i = 0;
        $('#tblNotas .filaNotas').each(function(){
            var idPer = $('.alumno:eq('+i+')').attr('id');
            var n1 = $('.nota1:eq('+i+')').val();
            var n2 = $('.nota2:eq('+i+')').val();
            var n3 = $('.nota3:eq('+i+')').val();
            var n4 = $('.nota4:eq('+i+')').val();
            var nf = $('.notafinal:eq('+i+')').val();
            $.post(baseurl+"notasc/deleteNotas",
            {idPer: idPer},
                function(data){

                });          


            $.post(baseurl+"notasc/saveNotas",
            {
                idPer: idPer,
                n1:n1,
                n2:n2,
                n3:n3,
                n4:n4,
                nf:nf
            },
                function(data){
                });
                i++;
        });
        alert("Se guardo satisfactiriamente");
    });