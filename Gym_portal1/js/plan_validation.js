$(function () {

    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function (element) {
            $(element)
                    .closest('.form-group')
                    .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                    .closest('.form-group')
                    .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'radio') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

    });
    
    $.validator.addMethod('Percentage',function(value,element){
	return value >0 && value <31;
	},'Enter percentage between 1 t 30');
	
    
    $("#Plans").validate({
        rules: {
            txtplan: {
                required: true,
                 maxlength:15
            },
            txtprice: {
                required: true,
                number: true
            },
            BMI: {
                required: true,
            },
            duration: {
                required: true,
            }
        },
            messages:
                    {
                        txtplan: {
                            required: 'Please enter plan name'
                        },
                        txtprice: {
                            required: 'Please enter plan price',
                            number: 'Only numaric values allowed'
                        },
                        BMI: {
                            required: 'Please select BMI suggession for customer'                         
                        },
                        duration: {
                            required: 'Please select plan duration'                         
                        }
                    }
        
    });
});




