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
	
    
    $("#Exercise_manage").validate({
        rules: {
            exercise_type: {
                required: true,
                
            },
            txtexnm: {
                required: true,
              
            },
            txtdesc: {
                required: true,
                range: [5,15]
            }
        },
            messages:
                    {
                        exercise_type: {
                            required: 'Please select exercise type'
                        },
                        txtexnm: {
                            required: 'Please enter exercise name'
                        },
                        txtdesc: {
                            required: 'Please enter exercise description'                         
                        }
                    }
        
    });
});




