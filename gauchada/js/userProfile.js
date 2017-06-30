$(document).ready(function() {
	$.ajax({
        type: "POST",
        url: "getUser.php",
        success: function(response) {
        	var usuarios = JSON.parse(response);
        	$('p').html(usuarios[0]);

        	$("#name").attr("value", usuarios[0]);
        	$("#lastname").attr("value", usuarios[1]);
        	$("#dni").attr("value", usuarios[2]);
        	$('#age').append($('<option>', {
			    value: usuarios[3],
			    text: usuarios[3]
			}));
			$("#address").attr("value", usuarios[4]);
        	$("#phone").attr("value", usuarios[5]);
        	$("#user").attr("value", usuarios[6]);
        	$("#pts").html(usuarios[7]);
        }
    });

	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
	    if (this.readyState == 4 && this.status == 200){
	        console.log(this.response, typeof this.response);
	        var img = document.getElementById('pic');
	        var url = window.URL || window.webkitURL;
	        var binaryData = [];
			binaryData.push(this.response);
	        img.src = url.createObjectURL(new Blob(binaryData, {type: "application/zip"}));
	    }
	}
	xhr.open('POST', 'getUserPicture.php', true);
	xhr.responseType = 'blob';
	xhr.send();
});