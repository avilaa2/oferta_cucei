
$(document).ready(function(){
    var calendario = $("select[name='cal']").val();

    get_materias(calendario);
    $("#actualizar").click(function(){
        var materia = $("select[name='materias']").val();
        get_nrc_materia(materia,calendario);
        get_detalle_materia(materia, calendario);
        
    });

});

function get_materias(calendario)
{
    $.ajax({
    url: 'php/get_materias.php',
    type: 'post',
    data: {calendario},
    dataType: 'html',
    success: function (result) {
        console.log(result);
        $("select[name='materias']").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}


function get_detalle_materia(materia, calendario)
{
    $.ajax({
    url: 'php/get_detalle_materia.php',
    type: 'post',
    data: {materia, calendario},
    dataType: 'html',
    success: function (result) {
        //console.log(result);
        $("#detalle").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}

function get_nrc_materia(materia, calendario)
{
    $.ajax({
    url: 'php/get_nrcs.php',
    type: 'post',
    data: {materia, calendario},
    dataType: 'html',
    success: function (result) {
        console.log(result);
        $("#nrc").empty().append(result);
    },
    error: function (r1,r2,r3)
    {
        console.log(r1 + r2 + r3);
    }
    });
}