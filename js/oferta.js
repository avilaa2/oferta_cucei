
$(document).ready(function(){
    var calendario = $("select[name='cal']").val();

    get_edificios(calendario);
    $("#actualizar").click(function(){
        var edificio = $("select[name='edificios']").val();
        var aula = $("select[name='aulas']").val();
        //console.log(edificio);
        //console.log(aula);

        get_oferta(edificio,aula,calendario);
    });

    $("select[name='edificios']").change(function(){
        var edificio = $("select[name='edificios']").val();
        get_aulas(edificio,calendario);
    });
});

function get_oferta(edificio, aula, calendario)
{
    $.ajax({
    url: 'php/get_oferta.php',
    type: 'post',
    data: {edificio, aula, calendario},
    dataType: 'html',
    success: function (result) {
        //console.log(result);
        $("#oferta").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}

function get_aulas(edificio, calendario)
{
    $.ajax({
    url: 'php/get_aulas.php',
    type: 'post',
    data: {edificio, calendario},
    dataType: 'html',
    success: function (result) {
        //console.log(result);
        $("select[name='aulas']").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}

function get_edificios(calendario)
{
    $.ajax({
    url: 'php/get_edificios.php',
    type: 'post',
    data: {calendario},
    dataType: 'html',
    success: function (result) {
        //console.log(result);
        $("select[name='edificios']").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}
//get_aulas('dedx','2017a');
//get_oferta('dedx','a004','2017a');
    