

$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "getCategories.php",
        success: function(response) {
            $('.categoria select').html(response).fadeIn();
        }
    });

    var now = new Date();
    minDate = now.toISOString().substring(0,10);
    $('#exp').prop('min', minDate);

    $('#modal').modal('show');
    var idPub = $("#idPub").attr("value");
    $.ajax({
        type: "POST",
        url: "getGauchada.php?id="+idPub,
        success: function(response) {
            var gau = JSON.parse(response);
            $("#title").attr("value", gau[0]);
            $("select option[value='" + gau[1].toString() + "']").attr("selected", true);
            $("#message").html(gau[2]);
            $('#exp').val(gau[3]);
            $("select option[value='" + gau[4].toString() + "']").attr("selected", true);

        }
    });

    /* Validate form*/
    $('#editForm').bootstrapValidator({
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
        //e.preventDefault();
        var formData = new FormData(this);
        var idPub = $("#idPub").attr("value");
        $.ajax({
            type: 'POST',
            url: "submitEditGauchada.php?id="+idPub,
            data: formData,
            async: false,
            success: function (data) {
                alert("Los cambios se efectuaron exitosamente.");
                document.location.href = "mis_publicaciones.php";
            },
            cache: false,
            contentType: false,   // by default jQuery sets this to urlencoded string
            processData: false  // do not process the data as url encoded params
        });
        return false;
    });

    function reset_form () {
        $('#editForm')[0].reset();
        $("#editForm").data('bootstrapValidator').resetForm();
    };

    $("#modal").on('hidden.bs.modal', function(){
        reset_form();
        document.location.href = "mis_publicaciones.php";
    });

});