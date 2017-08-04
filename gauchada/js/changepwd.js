$(document).ready(function() {
    
    $('#btn-sub').click(function() {
        var pwd = $('#pwd').val();
        var pwd2 = $('#pwd2').val();

        if (!pwd.includes(" ")) {
            if (pwd.length >= 6) {   
                if (pwd != pwd2) {
                    alert("Las contraseñas no coinciden.");
                }
                else {
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: 'changePwd.php?key='+pwd,
                        data: formData,
                        async: false,
                        success: function (data) {
                            alert("Su contraseña se modificó exitosamente.");
                            document.location.href = "userProfile.php";
                        },
                        cache: false,
                        contentType: false,   // by default jQuery sets this to urlencoded string
                        processData: false  // do not process the data as url encoded params
                    });
                }
            }
            else {
                alert("Debe tener al menos 6 caracteres.");
            }
        }
        else {
            alert("No debe contener espacios en blanco.");
        }
    })
});