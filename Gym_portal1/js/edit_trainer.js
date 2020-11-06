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
	 $.validator.addMethod('Age',function(value,element){
	return value <0;
	},'Please enter valid age');
	
    
    $("#trainer_prof").validate({
       rules:{
			txtunm:{
				required:true,
                                lettersonly:true

			},
			txtage:{
				required:true,
                                 range: [1, 120]
			},
			txtexp:{
				required:true,
				nowhitespace:true,
				lettersonly:true
			},
                        desc:{
				required:true,
                                minlength:10

			}
		},
		
		messages:
		{
			txtnm:{
				required:'Please enter trainer name',
				lettersonly:'Only characters allowed'
			},
			txtage:{
				required:'Please enter first name',
                                range:'Please enter valid age'
			},
			txtexp:{
				required:'Please enter trainer experiance'
			},
			desc:{
				required:'Please enter trainer description'
			}
		}
        
    });
});





