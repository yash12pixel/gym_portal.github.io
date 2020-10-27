$(function(){
	
	$.validator.setDefaults({
		errorClass:'help-block',
		highlight:function(element){
			$(element)
				.closest('.form-group')
				.addClass('has-error');
		},
		unhighlight:function(element){
			$(element)
				.closest('.form-group')
				.removeClass('has-error');
		},
		errorPlacement:function(error,element){
			if(element.prop('type')=='radio'){
				error.insertAfter(element.parent());
			}else{
				error.insertAfter(element);
			}
		}
		
	});	
	$("#Gym_prof").validate({
		rules:{
			txtemail:{
				required:true,
				email:true
			},
			gymadd:{
				required:true,
				
			},
                        gymdesc:{
				required:true,
				
			},
			txtunm:{
				required:true,
                                nowhitespace:true
			},
			txtgymnm:{
				required:true,
                                minlength:5
                         },
   
			
			txtmob:{
				required:true,
				minlength:10,
				maxlength:10,
				number: true
                         }
			
		},
		
		messages:
		{
			txtemail:{
				required:'Please enter email address',
				email:'please enter <em>valid</em> email address'
			},
			gymadd:{
				required:'Please enter address'
			},
                        txtgymnm:{
				required:'Please enter gym name'
                                
			},
                        gymdesc:{
				required:'Please enter gym description'
			},
			txtunm:{
				required:'Please enter username'
			},
			txtmob:{
				required:'Please enter mobile number',
				minlength:'Mobile number must be 10 digits long',
				maxlength:'Mobile number must be 10 digits long',
				number:'Only digits allowed'
			}

		}
	});
});





