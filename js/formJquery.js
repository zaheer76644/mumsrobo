$(function () {

	$('.submitButtonClass').on('click', function(){
        var hasError = false;
        $('.error').remove();
        $('.submitMsg').html("")
        $('.appointment-form .formRequired').each(function() {
            if($.trim($(this).val()) == '') {
                var labelText = $(this).data('label');
                $(this).parent().append('<p class="error">Please enter '+labelText+'.</p>');
                hasError = true;
            }
        });

        if(hasError == false){
                var data = $('form.appointment-form').serialize();
                // console.log(data)
                $('.submitMsg').html("Submitting data...please wait!!")
                $.ajax({
                        type: "post",
                        crossDomain: "true", 
                        url : 'js/mail-function.php',
                        data: data,
                        success: function(result){
                            if(result == 'success'){
                                $('.submitMsg').html("form submitted successfully")
                                //write success code
                            }else{
                                $('.submitMsg').html(result)
                                //write failure code
                            }
                        }
                });

        }
        return false;
    });
    
    
});
