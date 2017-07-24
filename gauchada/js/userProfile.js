	function showUserData() {	
		$.ajax({
	        type: "POST",
	        url: "getUser.php",
	        success: function(response) {
	        	var usuarios = JSON.parse(response);
	        	$("#usr2").html(usuarios[0]);

	        	$("#name2").attr("value", usuarios[0]);
	        	$("#lastname2").attr("value", usuarios[1]);
	        	$("#dni2").attr("value", usuarios[2]);
	        	$('#age2').append($('<option>', {
				    value: usuarios[3],
				    text: usuarios[3]
				}));
				$("#address2").attr("value", usuarios[4]);
	        	$("#phone2").attr("value", usuarios[5]);
	        	$("#user2").attr("value", usuarios[6]);
	        	$("#pts").html(usuarios[7]);
	        	$("#cdts").html(usuarios[9]);
	        }
	    });
	}

	function showUserPicture() {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
		    if (this.readyState == 4 && this.status == 200){
		        console.log(this.response.size, typeof this.response);
		        if (this.response.size == 0) {
		        	$("#pic").attr("src", "./imgs/def.jpg");
		        }
		        else {
			        var img = document.getElementById('pic');
			        var url = window.URL || window.webkitURL;
			        var binaryData = [];
					binaryData.push(this.response);
			        img.src = url.createObjectURL(new Blob(binaryData, {type: "application/zip"}));
			    }
		    }
		}
		xhr.open('POST', 'getUserPicture.php', true);
		xhr.responseType = 'blob';
		xhr.send();
	}

    function reset_form () {
        $('#editProfile')[0].reset();
        //$("#editProfile").data('bootstrapValidator').resetForm();
    };

	$(".edit").click(function(){
		$('#myModal').modal('show');
		reset_form();
		$.ajax({
	        type: "POST",
	        url: "getUser.php",
	        success: function(users) {
	        	var us = JSON.parse(users);

	        	$("#name").attr("value", us[0]);
	        	$("#lastname").attr("value", us[1]);
	        	$("#dni").attr("value", us[2]);
	        	$("select[name=age]").children().remove().end();
	        	for(var i=18;i<=99;i++) {
			        $("select[name=age]").append(new Option(i,i));
			    }
				$("#address").attr("value", us[4]);
	        	$("#phone").attr("value", us[5]);
	        	$("#user").attr("value", us[6]);
	        	$("select option[value=" + us[3].toString() + "]").attr("selected", true);
	        }
	    });
    });
	
$(document).ready(function() {	
	showUserData();
	showUserPicture();
});