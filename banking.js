$(document).ready(function() {
    $('#sent-text').hide();
    
    $('#checkme').click(function() {
        if ($(this).is(':checked')) {
            $('#submitbtn').removeAttr('disabled');
        } else {
            $('#submitbtn').attr('disabled', 'disabled');
        }
    });
    
    $('#forgotbtn').click(function(){
        $('#sent-text').show();
    });
});


$(document).ready(function() {
    $('input[name="rcode"]').change(function(){
    	$('input[name="rcode_display"]').val($(this).val());
    });
});

$(document).ready(function() {
     $('#forgotbtn').prop('disabled', true);
     $('#forgot-email').keyup(function() {
        if($(this).val() != '') {
           $('#forgotbtn').prop('disabled', false);
        }
     });
     $('#forgotbtn').click(function(){
        $('#forgot-email').prop('disabled', true);
     });
 });
