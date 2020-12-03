$(function () {

	$('.submitButtonClass').on('click', function(){
        var hasError = false;
        $('.appointment-form .formRequired').each(function() {
            if($.trim($(this).val()) == '') {
                var labelText = $(this).attr('name');
                $(this).parent().append('<p class="error">Please enter '+labelText+'.</p>');
                hasError = true;
            }
        });

        if(hasError == false){
                var data = $('form.appointment-form').serialize();
                console.log(data)

                $.ajax({
                        type: "post",
                        crossDomain: "true", 
                        url : 'js/mail-function.php',
                        data: data,
                        success: function(result){
                            if(result == 'success'){
                                //write success code
                            }else{
                                //write failure code
                            }
                        }
                });

        }
        return false;
    });
    
    
});
