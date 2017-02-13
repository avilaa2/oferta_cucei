
$(document).ready(function(){
    get_resumen();
});

function get_resumen()
{
    $.ajax({
        url: 'php/get_resumen.php',
        type: 'post',
        data: {},
        dataType: 'json',
        success: function (result) {
            console.log(result);
            $("#departamentos").append(result['DEPARTAMENTOS']);
            $("#edificios").append(result['EDIFICIOS']);
            $("#materias").append(result['MATERIAS']);
        },
        error: function (r1,r2,r3)
        {
            console.log(r1 + r2 + r3);
        }
    });
}

