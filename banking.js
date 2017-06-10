$(document).ready(function() {
    $('#checkme').click(function() {
        if ($(this).is(':checked')) {
            $('#submitbtn').removeAttr('disabled');
        } else {
            $('#submitbtn').attr('disabled', 'disabled');
        }
    });
});

$(document).ready(function() {
    $('input[name="rcode"]').change(function(){
    	$('input[name="rcode_display"]').val($(this).val());
    });
});