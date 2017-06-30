$("#points").change( function(){
    	var pt = $("#points").val() * 50;
    	document.getElementById("price").value = pt;
    });
$(document).ready(function() {
	$('#modalPoints').modal('show');

	var now = new Date();
	var year = now.getFullYear();
	for(var i=year;i<=year+10;i++) {
        $("select[name=year]").append(new Option(i,i));
    }

    $('#buyPoints').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            nCard: {
                validators: {
                	integer: {
                        message: 'Ingrese sólo números.'
                    },
                	stringLength: {
                		message: 'Debe tener 14 dígitos.',
                		min: 14,
                		max: 14
                	},
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            code: {
                validators: {
                	integer: {
                        message: 'Ingrese sólo números.'
                    },
                	stringLength: {
                		message: 'Debe tener 4 dígitos.',
                		min: 4,
                		max: 4
                	},
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            month: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            year: {
                validators: {
                    notEmpty: {
                        message: 'Este campo es obligatorio.'
                    }
                }
            },
            points: {
                validators: {
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
            url: 'submitBuyPoints.php',
            data: $('#buyPoints').serialize(),
            success: function () {
                alert("Su compra se realizó exitosamente.");
                document.location.href = "index.php";
            }
        });
    });

    function reset_form () {
        $('#buyPoints')[0].reset();
        $("#buyPoints").data('bootstrapValidator').resetForm();
    };

    $("#modalPoints").on('hidden.bs.modal', function(){
        reset_form();
        document.location.href = "index.php";
    });
 
});