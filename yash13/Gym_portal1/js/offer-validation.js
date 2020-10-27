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
            if (element.prop('type') == 'radio') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

    });
    
    $.validator.addMethod('Percentage',function(value,element){
	return value >0 && value <31;
	},'Enter percentage between 1 t 30');
	
    
    $("#Offer").validate({
        rules: {
            Sel_plan: {
                required: true
            },
            txtnm: {
                required: true,
                maxlength:15
            },
            txtper: {
                required: true,
                nowhitespace: true,
		number: true,
                Percentage:true
            }
        },
            messages:
                    {
                        Sel_plan: {
                            required: 'Please select plan'
                        },
                        txtnm: {
                            required: 'Please enter offer name'
                        },
                        txtper: {
                            required: 'Please enter percenteage',
                            numbersonly:'Only numaric values allowed'
                        }
                    }
        
    });
});


