$(document).ready(function() {

    $('#myModal').modal('show');
    var now = new Date();
    minDate = now.toISOString().substring(0,10);
    $('#exp').prop('min', minDate);

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
                        message: 'Este campo es obligatorio'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio'
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
                        message: 'Este campo es obligatorio'
                    }
                }
            }
        }
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