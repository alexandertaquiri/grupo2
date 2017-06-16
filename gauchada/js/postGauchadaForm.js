$(document).ready(function() {

    $('#myModal').modal('show');
    /*Restringe las fechas del timepicker*/
    var now = new Date();
    minDate = now.toISOString().substring(0,10);
    $('#exp').prop('min', minDate);

    $.ajax({
        type: "POST",
        url: "getCategories.php",
        success: function(response) {
            $('.categoria select').html(response).fadeIn();
        }
    });

    /* Validate form*/
    $('#gauchada').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            exp: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'El formato es: dd/mm/yyyy'
                    },
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            }
        }
    }).on('success.form.bv',function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'submitPostGauchada.php',
            data: $('#gauchada').serialize(),
                    success: function () {
                        alert("Su publicación se realizó exitosamente.");
                        document.location.href = "index.php";
                    }
        });
    });

    function reset_form () {
        $('#gauchada')[0].reset();
        $("#gauchada").data('bootstrapValidator').resetForm();
    };

    $("#myModal").on('hidden.bs.modal', function(){
        reset_form();
        document.location.href = "index.php";
    });

    $("#msg").on('click', function(){
        alert("No tiene crédito suficiente. Seleccione la opción Comprar Crédito");
    });
});