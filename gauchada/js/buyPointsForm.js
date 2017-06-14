$(document).ready(function() {
	$('#modalPoints').modal('show');

	for(var i=2017;i<=2040;i++) {
        $("select[name=year]").append(new Option(i,i));
    }
 
});